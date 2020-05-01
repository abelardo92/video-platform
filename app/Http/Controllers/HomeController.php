<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($filter = null, Request $request)
    {
        // filter logic
        if(is_null($filter)) {
            $filter = $request->get('filter');
            if(is_null($filter)) {
                $videos = Video::orderBy('id','desc')->paginate(5);
                return view('home', compact('videos'));
            }
            return redirect()->route('home',compact('filter'));
        }

        switch($filter) {
            case "new":
                $column = 'id';
                $order = 'desc';
            break;
            case "old":
                $column = 'id';
                $order = 'asc';
            break;
            case "alpha":
                $column = 'title';
                $order = 'desc';
            break;
            default:
                $column = 'id';
                $order = 'desc';
            break;
        }

        $videos = Video::orderBy($column, $order)->paginate(5);
        return view('home', compact('videos'));
    }
}
