<?php

namespace App\Actions\Comments;

use App\Interfaces\ICommentRepository;
use App\Models\Comment;

class CreateComment
{
    public function __construct(protected ICommentRepository $commentRepository)
    {
    }

    public function execute(array $data): Comment
    {
        return $this->commentRepository->create($data);
    }
}
