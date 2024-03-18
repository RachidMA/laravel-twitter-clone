@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@forelse($jobs as $job)
@include('includes.main-components.job_card')
@empty
<div class="container">
    <h1>No Job Postings Yet</h1>
</div>
@endforelse
{{$jobs->links()}}
<!-- 
    
 -->
<!-- <x:jobs-card /> -->

@endsection