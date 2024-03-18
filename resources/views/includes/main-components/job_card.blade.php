<div class="job-card col-md-8 w-100 pb-4">
    <div class="card card-bg w-100 p-2 ">
        <div class="profile-image border border-light rounded shadow d-flex mb-2">
            <img src="/img/{{$job->profile->profile_image}}" alt="" class="">
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
                <img src="/img/{{$job->image}}" alt="" class="w-50 h-50">
            </div>
        </div>
        <div class="card-likes-bar border border-light rounded shadow m-2 d-flex justify-content-between p-2">
            <p>LIKES</p>
            <p>comments</p>
            <p>shares</p>
        </div>
    </div>
</div>