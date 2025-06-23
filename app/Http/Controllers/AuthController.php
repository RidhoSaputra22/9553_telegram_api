<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        if (Auth::attempt(['hp' => $request->hp, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'status' => 200,
                'user' => $user,
                'message' => 'Login successful'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized'
            ]);
        };
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'hp' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 200,
            'user' => $user,
            'message' => 'User created successfully'
        ]);
    }
}
