<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Post Title' => $this->title,
            'Content' => $this->body,
            'User ID' => $this->user_id,
            'status_id' => $this->post_status_id,
            // 'post_status' => PostStatusResource::make($this->whenLoaded('post_status'))->withoutWrapping()
            // 'post_status' => PostStatusResource::make($this->whenLoaded('post_status'))->wrap('selected_data')
            'post_status' => PostStatusResource::make($this->whenLoaded('post_status'))
        ];
    }
}
