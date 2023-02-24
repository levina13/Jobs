<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            // return $this->sendResponse($success, 'User login successfully.');
        } else {
            // return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
