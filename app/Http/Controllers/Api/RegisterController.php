<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{
    /**
    * register api.
    *
    * @return \Illuminate\Http\Response
    */
    public function Register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'c_password' => 'required | same:password'
        ]);

        if($validator->fails()) {
            return $this->sendError('Validator Errors.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);
        $success['token'] = $user->createToken('laraApi')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User registered successfully');
    }

    /**
    * login api.
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('laraApi')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User login successfully');
        }
        else {
            return $this->sendError('Unauthorized.', ['error' => 'unauthorized']);
        }
    }
}
