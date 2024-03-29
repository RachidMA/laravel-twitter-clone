@extends('layouts.app')

@section('title', 'PERSONAL PROFILE')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile Data</h5>
                </div>
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{$profile->profile_image? $profile->imageUrl(): '/img/profile.png'}}" alt="Profile Image" class="profile-img">
                    </div>
                    <div class="form-group">
                        <label for="nickname" class="text-primary">Nickname</label>
                        <p class="border rounded p-2">{{$profile->nickName}}</p>
                    </div>
                    <div class="form-group">
                        <label for="phone-number" class="text-primary">Phone Number</label>
                        <p class="border rounded p-2" id="phonenumber">{{$profile->phoneNumber}}</p>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="text-primary">Bio</label>
                        <textarea class="form-control" id="bio" rows="4" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel gravida velit. Fusce vel ante neque. Nullam nec sem sem. Mauris eget pharetra lorem.</textarea>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{route('profiles.profile.edit', ['profile'=>$profile->id])}}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user-profile-created-jobs mt-4">
    <p>MOST RECENT JOBS THAT YOU HAVE POSTED</p>
    @forelse($profile->posts as $job)
    <x:job-card :job='$job' />
    @empty
    <p>No jobs created yet.</p>
    <li><a href="{{route('users.job.create', ['user'=>Auth::user()->profile->id])}}" class="btn btn-success text-white">CREATE POST</a></li>
    @endforelse
</div>

@endsection