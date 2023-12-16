<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($account_name) {
        if(!Auth::check()) {
            return redirect()->route('login.index');
        }

        try {
            $user = User::where('account_name', $account_name)->firstOrFail();
        } catch (\Throwable $th) {
            abort(404);
        }

        $entries = $user->entries()->orderBy('created_at', 'desc')->get();

        return view('users', ['user' => $user, 'entries' => $entries]);
    }
}
