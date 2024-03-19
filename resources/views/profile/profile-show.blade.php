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
                        <img src="{{$profile->imageUrl()}}" alt="Profile Image" class="profile-img">
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


@endsection