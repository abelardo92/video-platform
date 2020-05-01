<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function channel($user_id) {
        $user = User::find($user_id);
        $videos = Video::where('user_id', $user_id)->paginate(5);
        return view('users.channel', compact('user', 'videos'));
    }
}
