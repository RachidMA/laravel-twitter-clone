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

        <div class="collections categories-collection">
            <label for="Categories">Category: </label><br>
            <select name="category_id" id="categories" class="w-50 border border-light shadow rounded my-4">

                <option value="" selected>SELECT CATEGORY</option>
                @foreach ($categories as $category)
                <option value={{$category->id}}> {{$category->name}} </option>
                @endforeach
            </select>
            @error('categories')
            <div class="error-message text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="collections cities-collection">
            <label for="Categories">City: </label><br>
            <select name="cities" id="cities" class="w-50 border border-light shadow rounded my-4">
                <option value="" selected>SELECT CITY</option>
            </select>
            @error('cities')
            <div class="error-message text-danger">{{$message}}</div>
            @enderror
        </div>

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