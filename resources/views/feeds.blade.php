@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@forelse($jobs as $job)

<x:job-card :job='$job' />
@empty
<div class="container">
    <h1>No Job Postings Yet</h1>
</div>
@endforelse

<!-- 
    pagination
 -->
{{$jobs->withQueryString()->links()}}


@endsection