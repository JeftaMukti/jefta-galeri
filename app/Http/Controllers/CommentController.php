<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, $photoId)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comments = new Comment();
        $comments->body = $request->body;
        $comments->user_id = auth()->id();
        $comments->photo_id = $photoId;
        $comments->save();

        return back()->with('success','Comment Berhasil Di Tambahkan');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success','Comment Berhasil Di Hapus');
    }
}
