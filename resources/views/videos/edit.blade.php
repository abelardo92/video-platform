@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
            {{ csrf_field() }}
    
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <h2>{{__('Edit video')}}</h2>
            <hr/>
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$video->title}}"/>
            </div>
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>
                <textarea class="form-control" id="description" name="description">{{$video->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">{{__('Image')}}</label>
                @if(Storage::disk('images')->has($video->image))
                    <div class="video-image-thumb col-md-3 pull-left">
                        <div class="video-image-mask">
                            <img src="{{route('imageVideo',$video->image)}}">
                        </div>
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <div class="form-group">
                <label for="video">{{__('Video')}}</label>
                <video controls id="video-player">
                    <source src="{{route('videos.video', $video->video_path)}}">
                        Your browser is not compatible with HTML5
                </video>
                <input type="file" class="form-control" id="video" name="video" />
            </div>
            <button type="submit" class="btn btn-success">{{__('Save changes')}}</button> 
        </form>
    </div>
</div>
@endsection