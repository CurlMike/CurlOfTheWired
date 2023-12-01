<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function createAccount(Request $request) {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'account_name' => ['required', 'string', 'min:3', 'max:255', 'unique:users,account_name'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ]);

        User::create([
            'username' => $request->username,
            'account_name' => $request->account_name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_type' => 'user'
        ]);

        $credentials = $request->only('username', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
}
