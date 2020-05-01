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
                    <form class="col-md-8 pull-right" action="{{route('videos.search',$search ?? '')}}" method="GET">
                        <label for="filter">Filter</label>
                        <select name="filter" class="form-control">
                            <option value="new">Newest first</option>
                            <option value="old">Oldest first</option>
                            <option value="alpha">From A to Z</option>
                        </select>
                    </form>
                </div>
            </div>
            @include('videos.videos_list')
        </div>
    </div>
</div>
@endsection
