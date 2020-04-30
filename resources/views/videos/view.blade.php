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

    <div class="card">
        <div class="card-header">
            Uploaded by <strong>{{$video->user->name}} {{$video->user->surname}}</strong> {{FormatTime::LongTimeFilter($video->created_at)}}
        </div>
        <div class="card-body">
            {{$video->description}}
        </div>
    </div>

    @include('videos.comments')

</div>
</div>
@endsection