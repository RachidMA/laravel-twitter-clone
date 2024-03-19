<div class=" col   d-flex align-items-center  flex-column ">
    <div class="side-bar-links-list d-flex align-items-center justify-content-center h-100 border border-primary rounded">
        <ul class="h5 ">
            <li><a href="#">Home</a></li>
            <li><a href="#">Feed</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </div>
    <div class="side-bar-user-data ">
        <ul class="border border-prinamry rounded shadow p-4 h-50">
            @if(Auth::check() && Auth::user()->profile)
            <li><a href="{{route('users.profile.show',['profile'=>Auth::user()->profile])}}" class="btn btn-dark text-white ">GO TO Profile</a></li>
            <li><a href="{{route('users.job.create', ['user'=>Auth::user()->profile->id])}}" class="btn btn-success text-white">CREATE POST</a></li>
            @else
            <li><a href="{{route('users.job.create')}}" class="btn btn-dark text-white ">Create Job</a></li>
            @endif
            <li>
                <div class="btn btn-primary btn-md m-0" aria-labelledby="navbarDropdown">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>