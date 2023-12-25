<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SearchController extends Controller
{
    public function searchIndex() {
        return view('search', ['users' => []]);
    }

    public function searchUser(Request $request) {
        try {
            $request->validate([
                'username' => 'required'
            ]);
        }
        catch (ValidationException $e) {
            return response()->json(['error' => 'Query empty'], 422);
        }

        $searchQuery = $request->input('username');

        $users = User::where('username', 'LIKE', $searchQuery . '%')->get();
        
        return response()->json(['html' => view('partials._search-users', ['users' => $users])->render()]);
    }
}
