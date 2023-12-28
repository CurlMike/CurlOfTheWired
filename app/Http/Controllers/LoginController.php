<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'account_name' => ['required'],
            'password' => ['required'],
        ]);

        if (!User::where('account_name', $request->account_name)->first()) {
            return back()->withErrors([
                'account_name' => "Account doesn't exist."
            ]);
        }

        $remember = $request->has('remember');

        if (auth()->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'password' => 'Password does not match.'
        ])->withInput($request->only('account_name'));
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
