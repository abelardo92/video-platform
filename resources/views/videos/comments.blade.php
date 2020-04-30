<hr/>
Comments
<hr/>
@if(session('message'))
    <div class='alert alert-success'>{{session('message')}}</div>
@endif
@if(Auth::check())
<form class="col-md-4" method="POST" action="{{route('comments.store')}}">
    {{ csrf_field() }}
    <input type="hidden" name="video_id" value="{{$video->id}}" required />
    <p>
        <textarea class="form-control" name="body" required></textarea>
    </p>
    <input type="submit" value="Comment" class="btn btn-success" />
</form>
<hr/>
@endif

@if(isset($video->comments))
    <div id="comments-list">
        @foreach ($video->comments as $comment)
            <div class="comment-item col-md-12 pull-left">
                <div class="card">
                    <div class="card-header">
                        Uploaded by <strong>{{$comment->user->name}} {{$comment->user->surname}}</strong> {{FormatTime::LongTimeFilter($comment->created_at)}}
                    </div>
                    <div class="card-body">
                            {{$comment->body}}
                            @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))
                                <div class="pull-right">
                                    <a href="#deleteModal{{$comment->id}}" role="button" class="btn btn-primary" data-toggle="modal">Delete</a>
                                </div>
                                <div id="deleteModal{{$comment->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Are you sure you want to delete this comment?</p>
                                                <p>{{$comment->body}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="{{route('comments.delete',$comment->id)}}" type="button" class="btn btn-danger">Delete</a >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
            <br/>
        @endforeach
    </div>
@endif

<!-- Botón en HTML (lanza el modal en Bootstrap) -->
  
<!-- Modal / Ventana / Overlay en HTML -->

