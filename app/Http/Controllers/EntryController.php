<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function homeIndex() {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }

        $entries = Entry::with('user')->orderBy('created_at', 'desc')->get();

        return view('home', ['entries' => $entries]);
    }

    public function createEntry(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }

        $user = Auth::user();

        $data = $request->validate([
            'title' => 'max:63',
            'content' => 'required|max:65535',
            'media' => 'file|mimes:jpeg,png,jpg,gif,svg|max:5126'
        ]);

        $entry = new Entry();
        $entry->user_id = $user->id;
        $entry->content = $data['content'];

        if(isset($data['title'])) {
            $entry->title = $data['title'];
        }

        if($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('storage/entries'), $imageName);
            $entry->media = $imageName;
        }

        $entry->save();

        return redirect()->route('home');
    }

    public function deleteEntry($id) {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }

        $entry = Entry::find($id);

        $this->authorize('deleteEntry', $entry);

        $entry->delete();

        return redirect()->route('home');
    }
}
