<div id="videos-list">
    @if(count($videos) >= 1)
        @foreach ($videos as $video)
            <div class="video-item col-md-10 pull-left panel panel-default">
                <div class="panel-body row">
                    @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb col-md-3 pull-left">
                            <div class="video-image-mask">
                                <img src="{{route('imageVideo',$video->image)}}">
                            </div>
                        </div>
                    @endif
                    <div class="data col-md-8">
                        <h3 class="video-title"><a href="">{{$video->title}}</a></h3>
                    <p><a href="{{route('users.channel', $video->user_id)}}">{{$video->user->name}} {{$video->user->surname}}</a></p>
                    <a href="{{route('videos.view', $video->id)}}" class="btn btn-success">Watch</a>

                        @if(Auth::check() && Auth::user()->id == $video->user->id)
                            <a href="{{route('videos.edit', $video->id)}}" class="btn btn-warning">Edit</a>
                            <a href="#deleteModal{{$video->id}}" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>

                            <div id="deleteModal{{$video->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Are you sure you want to delete this video?</p>
                                            <p>{{$video->title}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a href="{{route('videos.delete',$video->id)}}" type="button" class="btn btn-danger">Delete</a >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">There are no videos available</div>
    @endif
    <div class="clearfix"></div>
    {{$videos->links()}}
    </div>