<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->image ? asset('storage/Blogs/' . $this->image) : null,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'comments' => $this->blogComments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'text' => $comment->comment,
                    'parent_id' => $comment->parent_id
                ];
            }),
            'author' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'published_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
