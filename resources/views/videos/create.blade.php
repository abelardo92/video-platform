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

            <h2>{{__('Create new video')}}</h2>
            <hr/>
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
            </div>
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">{{__('Image')}}</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <div class="form-group">
                <label for="video">{{__('Video')}}</label>
                <input type="file" class="form-control" id="video" name="video" />
            </div>
        <button type="submit" class="btn btn-success">{{__('Save video')}}</button> 
        </form>
    </div>
</div>
@endsection