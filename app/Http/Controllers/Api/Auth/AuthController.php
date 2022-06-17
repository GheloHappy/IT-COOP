<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $success = true;
            //$isAdmin = false;
            $message = "Logged In Successfully";
            
            // if(auth()->user()->is_admin == '1') {    
            //     $isAdmin = true;
            // }

            $user = User::where('email',$request->email)->first();
            $authToken = $user->createToken('token')->plainTextToken;
        } else {
            $success = false;
            $message = "Email or Password do not Match!";

            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);
        }

        $response = [
            'access_token' => $authToken,
            'success' => $success,
            'message' => $message,
            //'is_admin' => $isAdmin
        ];
        
        return response()->json($response);
    }


    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = "Registered Successfully";

        } catch (QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);

    }


    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = "Loggedout Successfully";
            
        } catch (QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }
}
