@extends('layouts.app')

@section('title' , config('app.name', 'Laravel'))


@section('content')
<div class="main vh-100 ">
    <div class="main-content-cards h-100 d-flex align-items-center justify-content-center">
        <div class="card-container  h-50 w-75  d-flex align-items-center justify-content-around">
            <div class="card card-profile mx-4 w-50 h-50 bg-primary d-flex align-items-center justify-content-center shadow-lg rounded">
                <a href="{{route('user.profile.create')}}" class="h4 display-5">GO TO PROFILE</a>
            </div>
            <div class="card card-feeds w-50 h-50 text-white  d-flex align-items-center justify-content-center ml-4 shadow-lg rounded">
                <a href="{{route('feeds')}}" class="h4 display-5">GO TO FEEDS</a>
            </div>
        </div>
    </div>
</div>
@endsection