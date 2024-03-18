<div class="post-comment  p-4 text-center ">
    <h3>Leave a Comment</h3>
    <form action="{{route('comments.store', ['job'=>$job->id])}}" method="POST" class="d-flex  justify-content-center align-items-center flex-column w-60 text-center bg-secondary  p-4">
        @csrf
        <input class="w-50 p-2 rounded border " type="text" name="comment" id="comment" placeholder="Your comment">

        @error('comment')
        <div class="error-message text-danger">{{$message}}</div>
        @enderror
        <button class="btn btn-primary w-50 mt-2" type="submit">Submit</button>
    </form>
</div>