<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $photo_id)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->photo_id = $photo_id;
        $comment->save();

        return back()->with('success','Comment Berhasil Di Tambahkan');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success','Comment Berhasil Di Hapus');
    }
}
