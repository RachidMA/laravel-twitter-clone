@extends('layouts.app')

@section('title', 'Job Details')

@section('content')
<!--SINGLE JOB CARD DETAILS-->
<!-- @include('includes.main-components.job_card') -->
<x:job-card :job="$job" />
<!--POST COMMENT BLADE-->
<x:comment-form-card :job="$job" />

<!--LIST OF JOB COMMENTS-->
@forelse($job->comments as $comment)
@include('includes.main-components.comments')
@empty
<p class="text-muted text
-center py-5">No comments yet.</p>
@endforelse

@endsection