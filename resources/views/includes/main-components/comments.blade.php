<div class="card card-bg w-100 p-2 mb-2 ">
    <div class="profile-image d-flex mb-2">
        <img src="/img/{{$comment->profile->profile_image}}" alt="" class="">
        <div class="nick-name mt-2">
            <a href="#" class="link-info" title="See Profile">{{$job->profile->nickName}}</a><br>
        </div>
    </div>
    <p>{{$comment->comment}} <span class="comment-date">{{$comment->createdAt()}}</span></p>

</div>