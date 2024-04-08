@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="admin-dashboard-main">
    <h2>WEBSITE STATISTICS.</h2>
    <div class="statistics">
        <div class="statistics-container total-users">
            <h3 class="total-users-title">TOTAL USERS</h3>
            <p class="total-users-number animate-number">{{$totalUsers}}</p>
        </div>
        <div class="statistics-container total-profiles">
            <h3 class="total-users-title">TOTAL PROFILES</h3>
            <p class="total-users-number animate-number">{{$totalProfiles}}</p>
        </div>
        <div class="statistics-container total-jobs">
            <h3 class="total-users-title">TOTAL JOBS</h3>
            <p class="total-users-number animate-number">{{$totalPosts}}</p>
        </div>
    </div>

</div>


@endsection