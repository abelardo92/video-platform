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
                    </div>
                </div>
            </div>
            <br/>
        @endforeach
    </div>
@endif
