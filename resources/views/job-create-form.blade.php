@extends('layouts.app')

@section('title', 'JOB CREATE FORM')

@section('content')
<div class="job-create-form bg-light border border-light rounded shadow text-center p-4">
    <p>Enter the job details below:</p>
    <form action="{{$editing ? route('jobs.update', ['job'=>$job->id]) :route('users.job.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="name">Job Title: </label><br>
        <input type="text" id="name" name="title" class="w-100 border p-2" value="{{$editing ? $job->title : old('title')}}"><br><br>
        @error('title')
        <div class="error-message text-danger">{{$message}}</div>
        @enderror

        <label for="description">Description: </label><br>
        <textarea rows="4" cols="50" id="description" name="description" class="border w-100">{{$editing ? $job->description : old('description')}}</textarea><br><br>
        @error('description')
        <div class="error-message text-danger">{{$message}}</div>
        @enderror

        <!-- upload image -->
        <label for="image">{{$editing ? 'Upload New Image Or Keep the Old' : 'Upload Image'}} </label><br>
        <input type="file" accept="image/*" id="image" name="image" class="border shadow mt-2"><br><br>
        @error('image')
        <div class="error-message text-danger">{{$message}}</div>
        @enderror
        <!-- submit--->
        <input type="submit" value="Submit Job" class="btn btn-primary">
    </form>
</div>
@endsection