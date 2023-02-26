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

class AuthController extends Controller
{
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
            // return $this->sendError('Validation Error.', $validator->errors());
            return $validator->errors();

        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        // return $this->sendResponse($success, 'User register successfully.');
        return $success;
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
            if (Auth::attempt([$inputan => $request->email_telepon, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['name'] =  $user->name;
                return 'berhasil login';
                // return $this->sendResponse($success, 'User login successfully.');
            } else {
                // return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                return 'Unauthorised';
            }
        }else
        {
            return 'tidak ada pengguna';
        }

    }
}
