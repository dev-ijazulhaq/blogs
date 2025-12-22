<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'is_publish' => (bool) $this->is_publish,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTImeString(),
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
        ];
    }
}
