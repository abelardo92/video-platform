@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'>{{session('message')}}</div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h2>Busqueda: {{$search ?? ''}}</h2>
                </div>
                <div class="col-md-4">
                    @include('videos.filter_button', ['action' => 'videos.search'])
                </div>
            </div>
            {{-- <div class="clearfix"></div> --}}
            @include('videos.videos_list')
        </div>
    </div>
</div>
@endsection