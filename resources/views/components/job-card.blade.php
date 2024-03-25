@props(['job'])

<div class="job-card col-md-8 w-100 pb-4">
    <div class="card card-bg w-100 p-2 ">
        <div class="profile-image border border-light rounded shadow d-flex mb-2">
            <img src="{{$job->profile->image ? $job->profile->imageUrl() : '/img/profile.png'}}" alt="" class="">
            <div class="nick-name mt-2">
                <a href="#" class="link-info" title="See Profile">{{$job->profile->nickName}}</a><br>
            </div>
        </div>
        <div class="card-content border border-light rounded shadow p-4">
            <a href="{{route('jobs.show', ['job'=>$job->id])}}" class="card-title h4 link-info" title="Read More">{{$job->title}}</a><span>
                {{$job->createdAt()}}
            </span>

            <div class="{{((request()->is('feeds'))) ? 'card-description' : ''}} pb-4 ">
                {{$job->description}}
            </div>
            <div class="card-image w-100 text-center ">
                <img src="{{$job->image ? $job->imageUrl() : '/img/job.png'}}" alt="" class="w-50 h-50">
            </div>
        </div>
        <!-- SHOW  BUTTONS HERE ONLY IN THE SHOW SINGLE JOB PAGE AND ONLY FOR THE PERSON WHO CREATED -->
        @if((request()->path() === 'jobs/'.$job->id.'/show'))
        <!-- CHECK IF USER IS LOGGED IN AND HAS PROFILE -->
        @if(Auth::check() && Auth()->user()->profile)
        @can('update-job', $job)
        <div class="edit-delete-buttons  d-flex justify-content-around align-items-center p-2">
            <a href="{{route('jobs.edit', ['job'=>$job->id])}}" class="btn btn-outline-dark">Edit</a>
            <div class="delete pt-2 ">
                <form action="{{route('jobs.job.delete', ['job'=>$job->id])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
        @endcan

        @endif
        @endif

        <div class="card-likes-bar border border-light rounded shadow m-2 d-flex justify-content-between p-2">
            <p>LIKES</p>
            <p>comments</p>
            <p>shares</p>
        </div>
    </div>
</div>