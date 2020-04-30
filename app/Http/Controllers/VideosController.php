<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Comment;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    public function create() {
        return view('videos.create');
    }

    public function store(Request $request) {
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'video' => 'mimes:mp4'
        ]);

        $video = new Video();
        $user = Auth::user();
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->status = "";

        $image = $request->file('image');
        if($image) {
            $image_path = time().$image->getClientOriginalName();
            Storage::disk('images')->put($image_path, File::get($image));
            $video->image = $image_path;
        }

        $video_file = $request->file('video');
        if($video_file) {
            $video_path = time().$video_file->getClientOriginalName();
            Storage::disk('videos')->put($video_path, File::get($video_file));
            $video->video_path = $video_path;
        }

        $video->save();

        $message = "Video has been uploaded succesfully";
        return redirect()->route('home')->with('message');
    }

    public function edit($id) {

        $video = Video::findOrFail($id);
        $user = Auth::user();
        return view('videos.edit', compact('video'));
    }

    public function update($video_id, Request $request) {
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'video' => 'mimes:mp4'
        ]);

        $video = Video::findOrFail($video_id);
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        $image = $request->file('image');
        if($image) {
            $image_path = time().$image->getClientOriginalName();
            Storage::disk('images')->put($image_path, File::get($image));
            Storage::disk('images')->delete($video->image);
            $video->image = $image_path;
        }

        $video_file = $request->file('video');
        if($video_file) {
            $video_path = time().$video_file->getClientOriginalName();
            Storage::disk('videos')->put($video_path, File::get($video_file));
            Storage::disk('videos')->delete($video->video_path);
            $video->video_path = $video_path;
        }

        $video->update();
        return redirect()->route('home')->with(array(
            'message' => 'El video se ha actualizado',
        ));

    }

    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function getVideo($filename) {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

    public function view($video_id) {
        $user = Auth::user();
        $video = Video::find($video_id);
        if($user && $video->user_id == $user->id) {
            return view('videos.view', compact('video'));
        } else {
            return redirect()->route('home');
        }
    }

    public function delete($video_id) {
        $user = Auth::user();
        $video = Video::find($video_id);
        $comments = Comment::where('video_id', $video_id)->get();

        if($user && $video->user_id == $user->id) {
            // delete related comments
            if($comments && count($comments) >= 1) {
                foreach($comments as $comment) {
                    $comment->delete();
                }
            }

            // delete files
            Storage::disk('images')->delete($video->image);
            Storage::disk('videos')->delete($video->video_path);

            $video->delete();
            $message = array('message' => 'Video deleted succesfully');
        } else {
            $message = array('message' => 'Problem deleting video');
        }
        return redirect()->route('home')->with($message);
    }
}
