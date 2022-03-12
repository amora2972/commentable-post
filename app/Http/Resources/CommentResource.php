<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_name' => $this->user_name,
            'text' => $this->text,
        ];
    }
}
