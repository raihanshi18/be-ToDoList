<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password), 
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function auth(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255',
        ]);

        $user = User::whereEmail($request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                "message" => "wrong password"
            ], 401);
        }

        $token = $user->createToken('-AuthToken')->plainTextToken;
        return response()->json([
            "message" => "Login success",
            "access_token" => $token,
        ]);


        return response()->json(['message' => 'User created successfully'], 201);
    }

}
