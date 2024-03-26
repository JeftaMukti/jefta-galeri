<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('photos', 'albums')->find(Auth::id());

        return view("profile.index", compact('user'));
    }

    public function indexById($userId)
    {
        $user = User::with('photos','albums')->find($userId);
        if (! $user) {
            abort(404);
        }
        return view('profile.index2', compact('user'));
    }

    public function indexAlbum($albumId)
    {
        $user = User::with('photos', 'albums')->find(Auth::id());
        $album = $user->albums->where('id', $albumId)->first(); // Fetch the album based on the provided album ID
        $photos = $album->photo()->paginate(9);
        return view("profile.album", compact('user', 'album', 'photos'));
    }

    public function albumId($albumId)
    {
        $user = User::with('photos', 'albums')->find($albumId);
        $album = $user->albums->where('id', $albumId)->first(); // Fetch the album based on the provided album ID
        $photos = $album->photo()->paginate(9);
        return view("profile.album2", compact('user', 'album', 'photos'));
    }

    public function show($photoId)
    {
        $user = User::with('photos','albums')->find(Auth::id());
        $photos = $user->photos->where('id', $photoId)->first();
        $comments = Comment::where('photo_id', $photoId)->get();
        $likes = Like::where('photo_id', $photoId)->get();
        return view('profile.show',compact('user','photos','comments','likes'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $result = User::where('name','like', "%$search%")->get();

        return view('dashboard',['result' => $result]);
    }
}
