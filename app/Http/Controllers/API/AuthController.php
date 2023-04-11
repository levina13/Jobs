<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Models\jenis_perusahaan;
use App\Models\perusahaan;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Routing\Redirector;

class AuthController extends BaseController
{
    // Open View
    public function regisView()
    {
        $jenis_perusahaan=jenis_perusahaan::select('*')->get();
        return view('auth.registrasi', ['jenis_perusahaan'=>$jenis_perusahaan]);
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users,email',
            // Password min 8 karakter, ada huruf, campuran kapital&kecil
            // Terdapat nomor, ada simbol
            'password' => ['required', Password::min(8), 'confirmed'],
            'telepon' => 'required|numeric|unique:users,telepon|digits_between:9,12',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => "Failed to Register, your data is incorrect",
                'error' => $validator->errors()->toJson()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['photo']='profileapplicant.png';
        // return $input;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        return response()->json([
            'status' => 'success',
            'message' => 'register succesfully, You can log in to your account!!'
        ]);
    }
    
    public function registerCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users,email',
            // Password min 8 karakter, ada huruf, campuran kapital&kecil
            // Terdapat nomor, ada simbol
            'password' => ['required', Password::min(8)],
            'telepon' => 'required|numeric|unique:users,telepon|digits_between:9,12',
            'address'=>'required',
            'id_jenis_perusahaan'=>'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // Simpan user
        $user = new User;
        $user->name=$input['name'];
        $user->email=$input['email'];
        $user->password=$input['password'];
        $user->telepon=$input['telepon'];
        $user->role=$input['role'];
        $user->photo='company.jpg';
        $user->save();
        
        // cari id_user
        $id_owner= User::select('id')->where('email', $input['email'])->first();
        // Simpan Perusahaan
        $perusahaan= new perusahaan;
        $perusahaan->address= $input['address'];
        $perusahaan->id_owner = $id_owner->id;
        $perusahaan->id_jenis_perusahaan=$input['id_jenis_perusahaan'];
        $perusahaan->save();


        // $user = User::create($input);
        // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        // $success['name'] =  $user->name;
        return response()->json([
            'status' => 'success',
            'message' => 'register succesfully, You can log in to your account!!'
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users,email',
            // Password min 8 karakter, ada huruf, campuran kapital&kecil
            // Terdapat nomor, ada simbol
            'password' => ['required', Password::min(8)],
            'telepon' => 'required|numeric|unique:users,telepon|digits_between:9,12',
            'role'=>'required'
        ]);
        
        if ($validator->fails()) {

            return response()->json([
                'status'=>'failed',
                'message'=>'failed to register'
            ]);

            // return back()->withInput()->with('alert', $alert);
            // return $this->sendError('Validation Error.', $validator->errors());
            // return $validator->errors();
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        $alert = [
            'type' => 'success',
            'message' => 'Register Successfully.'
        ];

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // nilai return -1 untuk tdk ada pengguna, -2 u/inputan tidak cocok, 1 untuk pencari loker, 2 untuk company
        // Cek telepon atau email
        $inputan= (is_numeric($request->email_telepon)? 'telepon':'email');
        // Cek apakah ada user tersebut
        $status=User::where($inputan, $request->email_telepon)
                            ->first();
        // Cek apakah ada user dgn email/telepon tersebut
        if(isset($status->id))
        {
            Auth::attempt([$inputan => $request->email_telepon, 'password' => $request->password]);
            if (Auth::check())
            {
                $request->session()->regenerate();
                if(Auth::user()->role=='B')
                {
                    // return redirect()->route('admin-page');
                    return response()->json([
                        'status'=> 'success',
                        'role'=>    'company',
                        'message' =>'Successfully login as company'
                    ]);
                }elseif (Auth::user()->role=='A') {
                    // nilai return 0 untuk gagal, 1 untuk pencari loker, 2 untuk company
                    return response()->json([
                        'status' => 'success',
                        'role'=>'applicant',
                        'message' => 'Successfully login as applicant'
                    ]);
                    
                }
            }
            // return $alert;
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to login, ID and password dont match'
            ]);
        }else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to login, user not found'
            ]);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
