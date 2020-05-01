@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('message'))
                <div class='alert alert-success'>{{session('message')}}</div>
            @endif
            <h2>Busqueda: {{$search ?? ''}}</h2>
            @include('videos.videos_list')
        </div>
    </div>
</div>
@endsection