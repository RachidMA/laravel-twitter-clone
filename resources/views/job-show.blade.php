@extends('layouts.app')

@section('title', 'Job Details')

@section('content')

@include('includes.main-components.job_card')
<div class="post-comment  p-4 text-center ">
    <h3>Leave a Comment</h3>
    <form action="{{route('comments.store', ['job'=>$job->id])}}" method="POST" class="d-flex  justify-content-center align-items-center flex-column w-60 text-center bg-secondary  p-4">
        @csrf
        <input class="w-50 p-2 rounded border " type="text" name="comment" id="comment" placeholder="Your comment">
        <button class="btn btn-primary w-50 mt-2" type="submit">Submit</button>
    </form>
</div>
@forelse($job->comments as $comment)
@include('includes.main-components.comments')
@empty
<p class="text-muted text
-center py-5">No comments yet.</p>
@endforelse

@endsection