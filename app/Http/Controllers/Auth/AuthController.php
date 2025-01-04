<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return redirect()->route('social-auth');
    }

    public function login(Request $request) {
        $input = $request->all();
        Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
        return redirect()->route('dashboard');
    }
}
