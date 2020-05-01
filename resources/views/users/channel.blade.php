@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'>{{session('message')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$user->name}}'s channel</h2>
                </div>
            </div>
            {{-- <div class="clearfix"></div> --}}
            @include('videos.videos_list')
        </div>
    </div>
</div>
@endsection