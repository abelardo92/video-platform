<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class CommentsController extends Controller
{
    public function store(Request $request) {
        $validatedData = $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment();
        $user = Auth::user();
        $comment->user_id = $user->id;
        $comment->video_id = $request->input('video_id');
        $comment->body = $request->input('body');
        $comment->save();

        // $video_id = $comment->video_id;
        return redirect()->route('videos.view', $comment->video_id)->with(array(
            'message' => 'Comment added succesfully'
        ));

    }
}
