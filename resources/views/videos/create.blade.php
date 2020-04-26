@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data" class="col-lg-7">
            <h2>{{__('Create new video')}}</h2>
            <hr/>
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>
                <textarea class="form-control" id="description" name="description"></textarea>
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