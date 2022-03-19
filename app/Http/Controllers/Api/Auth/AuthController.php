<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

           
        $validated = Validator::make($request->all(), $rules);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'messages' => 'The given data was invalid.', 'errors' => $validated->errors()]);
        }

        $user = User::where('email', $request->email)->first();
       
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect.']);
        }
          
        $token =  $user->createToken('Created!', ['role:User'])->plainTextToken;
        return response()->json(['user' => $user,'token'=>$token]);
    }
}
