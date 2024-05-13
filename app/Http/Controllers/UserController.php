<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('users.edit', [
            'user' => Auth::user(),
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only(['background_color', 'text_color']));

        return redirect()->back()->with(['success' => 'Changes Saved Successfully!']);
    }
    public function show(User $user)
    {
        $user->load('links');

        return view('users.show', [
            'user' => $user,
            // 'links' => Link::where('user_id', $user->id)->get(),
        ]);
    }
}
