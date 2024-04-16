<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {

        //FOR RETURN COLLECTION OF POST
        $collectioOfPost = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'Category' => $this->category->name,
            'link' =>  route('posts.show', ['post' => $this->id]),
        ];

        //FOR RETURNING SINGLE  POST DATA WITH 
        //URL: http://127.0.0.1:8000/api/posts/{post}/show
        $singlePost = [
            'type' => 'SINGLE POST',
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'Category' => $this->category->name,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('M d, Y h:i A'),

        ];
        return ($request->post) ? $singlePost : $collectioOfPost;
    }
}
