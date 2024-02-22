<?php

namespace App\Http\Controllers;

use  App\Models\User;
use  App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with('user')->get();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get currently logged-in user
        $user = Auth::user();

        return view('albums.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $album = Album::create([
            'name_album' => $request->name_album,
            'deskripsi'=> $request->deskripsi,
            'user_id'=> $user->id,
        ]);

        return redirect()->route('albums.index')->with('success','Data Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
{
    // Tidak perlu mengambil koleksi album lagi, karena objek album sudah diteruskan oleh Laravel
    return view('albums.edit', compact('album'));
}

public function update(Request $request, Album $album)
{
    // Tidak perlu mengambil koleksi album lagi, karena objek album sudah diteruskan oleh Laravel
    if ($album->user_id !== Auth::id()) {
        abort(403);
    }

    $album->update($request->all());
    return redirect()->route('albums.index')->with('success','Data Berhasil Di Edit');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Album $album)
    {
        $albums = Album::where('user_id', auth()->id())->get();
        if ($album->user_id !== Auth::id()) {
            abort(403);
        }

        $album->delete();
        return redirect()->route('albums.index')->with('success','Data Berhasil Di Hapus');
    }
}
