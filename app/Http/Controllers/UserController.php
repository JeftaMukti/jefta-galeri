<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $user = User::where('name', 'like', '%' . $query . '%')->get();
        return view('dashboard', compact('user'));
    }

    public function profile(User $user)
    {
        return view('profile', compact('user'));
    }
}
