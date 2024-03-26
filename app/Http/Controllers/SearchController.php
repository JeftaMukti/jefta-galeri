<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       $searchTerm = $request->input('query');
       $users = User::where('username','like','%'. $searchTerm .'%')->paginate(10);
       return view('dashboard', compact('users'));
    }

    public function autocomplete(Request $request)
    {
        $searchTerm = $request->input('query');
        $users = User::where('username','like','%'. $searchTerm .'%')->paginate(5);
        return response()->json(['users'=> $users]);
    }
}
