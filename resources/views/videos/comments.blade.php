<hr/>
Comments
<hr/>
@if(session('message'))
    <div class='alert alert-success'>{{session('message')}}</div>
@endif
<form class="col-md-4" method="POST" action="{{route('comments.store')}}">
    {{ csrf_field() }}
    <input type="hidden" name="video_id" value="{{$video->id}}" required />
    <p>
        <textarea class="form-control" name="body" required></textarea>
    </p>
    <input type="submit" value="Comment" class="btn btn-success" />
</form>