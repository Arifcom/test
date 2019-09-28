<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('register');
    }

    public function register(Request $request)
    {
        $users = new User();
        $users['name'] = $request->name;
        $users['email'] = $request->email;
        $users['password'] = Hash::make($request->password);
        $users->save();

        return $users;
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $users = User::where('email', $email)->first();

        if(Hash::check($password, $users->password)) {
            $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $api_token = base64_encode(substr(str_shuffle($string), 0 , 32));

            $users->update(['api_token' => $api_token]);
        }

        return $users;
    }
}
