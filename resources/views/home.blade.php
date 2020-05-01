@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'>{{session('message')}}</div>
            @endif
            <div class="row">
                <div class="col-md-4 offset-md-6">
                    @include('videos.filter_button', ['action' => 'home'])
                </div>
            </div>
            @include('videos.videos_list')
        </div>
    </div>
</div>
@endsection
