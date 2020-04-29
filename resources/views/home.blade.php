@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'></div>
            @endif
            <div id="videos-list">
            @foreach ($videos as $video)
                <div class="video-item col-md-10 pull-left panel panel-default">
                    <div class="panel-body row">
                        @if(Storage::disk('images')->has($video->image))
                            <div class="video-image-thumb col-md-3 pull-left">
                                <div class="video-image-mask">
                                    <img src="{{route('imageVideo',$video->image)}}">
                                </div>
                            </div>
                        @endif
                        <div class="data col-md-8">
                            <h3 class="video-title"><a href="">{{$video->title}}</a></h3>
                            <p>{{$video->user->name}} {{$video->user->surname}}</p>
                            <a href="" class="btn btn-success">Watch</a>
                            @if(Auth::check() && Auth::user()->id == $video->user->id)
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
            </div>
        </div>
        {{$videos->links()}}
    </div>
</div>
@endsection
