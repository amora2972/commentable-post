<?php

namespace App\Http\Requests;

use App\Interfaces\ICommentRepository;
use App\Rules\NestedChecker;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_name' => 'required|max:255',
            'text' => 'required',
            'parent_id' => new NestedChecker(app(ICommentRepository::class), $this->parent_id),
        ];
    }
}
