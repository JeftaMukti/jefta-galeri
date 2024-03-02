<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Album;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photo = Photo::with('album')->where('user_id', auth()->id())->get();
        return view('photos.index', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->get();
        return View('photos.create',compact('user','albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'judul_foto' => 'required',
            'deskripsi_foto' => 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'album_id'=> 'required|exists:albums,id',
        ]);

        $imageName = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('images'), $imageName); 

        $photo = Photo::create([
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto'=> $request->deskripsi_foto,
            'image'=> $imageName,
            'album_id' => $request->album_id,
            'user_id'=> $user->id,
        ]);
        return redirect()->route('photos.index')->with('success','Data Berhasil di ');
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
    public function edit( Photo $photo)
    {
        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->get();
        return View('photos.edit',compact('user','albums','photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
{
    $user = Auth::user();
    $request->validate([
        'judul_foto' => 'required',
        'deskripsi_foto' => 'required',
        'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'album_id'=> 'required|exists:albums,id',
    ]);

    $data = [
        'judul_foto' => $request->judul_foto,
        'deskripsi_foto'=> $request->deskripsi_foto,
        'album_id' => $request->album_id,
        'user_id'=> $user->id,
    ];

    if ($request->hasFile('image')) {
        // Upload new image
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName); 

        // Delete old image
        if (file_exists(public_path('images/' . $photo->image))) {
            unlink(public_path('images/' . $photo->image));
        }

        $data['image'] = $imageName;
    }

    $photo->update($data);
    return redirect()->route('photos.index')->with('success','Data Berhasil Di Edit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photos = Photo::where('user_id', auth()->id())->get();
        if ($photo->user_id !== Auth::id()) {
            abort(403);
        }

        $photo->delete();
        return redirect()->route('photos.index')->with('success','Data Berhasil Di Hapus');
    }

    public function like($photoId)
    {
        $userId = auth()->id();

        $like = Like::where('user_id',$userId)->where('photo_id',$photoId)->first();

        if (!$like) {
            Like::create([
                'user_id'=> $userId,
                'photo_id' => $photoId,
            ]);
        }else{
            $like->delete();
        }
        return back()->with('success','data berhasil');
    }
}
