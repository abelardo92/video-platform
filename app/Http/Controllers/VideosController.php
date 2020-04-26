<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HttpFoundation\Response;

use App\Video;
use App\Comment;

class VideosController extends Controller
{
    public function create() {
        return view('videos.create');
    }
}
