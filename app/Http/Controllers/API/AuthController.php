<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
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
        return view('auth.registrasi');
    }

    public function loginView()
    {
        return view('auth.login');
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
            $alert=[
                'type'=>'danger',
                'message'=>'Failed to Login.'
            ];
            return back()->withInput()->with('alert', $alert);
            return $this->sendError('Validation Error.', $validator->errors());
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
        return redirect()->route('loginView')->with ("alert", $alert);
        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
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
                }elseif (Auth::user()->role=='A') {
                    return redirect()->route('home')->with('status', 'User login successfully.');
                }
            }
            $alert = [
                'type'=>'danger',
                'message'=>'Failed to Login, ID and password dont match.'
            ];
            // return $alert;
            return back()->withInput()->with('alert',$alert);
        }else
        {
            $alert = [
                'type' => 'danger',
                'message' => 'User Not found.'
            ];
            // return $alert;
            return back()->withInput()->with('alert', $alert);
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
