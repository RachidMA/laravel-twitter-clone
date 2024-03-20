@extends('layouts.app')

@section('CREATE PROFILE FORM')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile</h5>
                </div>
                @if(Auth::user()->profile)
                <div class="text-center mb-4">
                    <img src="{{$profile->profile_image ? $profile->imageUrl(): '/img/profile.png'}}" alt="Profile Image" class="profile-img">
                </div>
                @endif
                <div class="card-body">
                    <form action="{{$editing ? route('profiles.profile.store', ['profile'=>$profile->id]) :route('profile.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center">
                            <p class="border rounded text-primary">{{($editing && $profile->profile_image) ? 'Upload New Image Or Keep the Old' : 'Upload Image'}}</p>
                            <input type="file" class="form-control-file my-2 border rounded shadow" name="profile_image" accept="image/*">
                        </div>
                        <div class="form-group mt-4">
                            <label for="nickName" class="mb-2 text-primary">Nickname</label>
                            <input type="text" class="form-control" name="nickName" id="nickname" placeholder="Enter your nickname" value="{{$editing ? $profile->nickName : old('nickName')}}">
                        </div>
                        @error('nickName')
                        <div class="error-message text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group mt-4">
                            <label for="phoneNumber" class="mb-2 text-primary">Phone Number</label>
                            <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter your nickname" value="{{$editing ? $profile->phoneNumber : old('phoneNumber')}}">
                        </div>
                        @error('phoneNumber')
                        <div class="error-message text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group py-4">
                            <label for="bio" class="mb-2 text-primary">Bio</label>
                            <textarea class="form-control" id="bio" rows="4" name="bio" placeholder="Enter your bio">{{$editing ? $profile->bio : old('bio')}}</textarea>
                        </div>
                        @error('bio')
                        <div class="error-message text-danger">{{$message}}</div>
                        @enderror
                        <div class="save-button text-center broder rounded shadow py-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection