<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'text' => $this->text,
            'parent_id' => $this->parent_id,
            'children' => $this->whenLoaded('children'),
        ];
    }
}
