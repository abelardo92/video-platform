@extends('layouts.app')

@section('content')
<div class="col-md-11 offset-md-1">
<h2>{{$video->title}}</h2>
<hr/>
<div class="col-md-8">
    <video controls id="video-player">
    <source src="{{route('videos.video', $video->video_path)}}">
        Your browser is not compatible with HTML5
    </video>

</div>
</div>
@endsection