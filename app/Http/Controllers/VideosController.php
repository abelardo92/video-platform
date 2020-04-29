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

    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function getVideo($filename) {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

    public function view($video_id) {
        $video = Video::find($video_id);
        return view('videos.view', compact('video'));
    }
}
