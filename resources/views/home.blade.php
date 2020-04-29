@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'></div>
            @endif
            <ul id="videos-list">
            @foreach ($videos as $video)
                <li class="video-item col-md-4 pull-left">
                    @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb">
                            <div class="col-md-6 col-md-offset-3">
                                <img src="{{route('imageVideo',$video->image)}}">
                            </div>
                        </div>
                    @endif
                    <div class="data">
                    <h4>{{$video->title}}</h4>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
        {{$videos->links()}}
    </div>
</div>
@endsection
