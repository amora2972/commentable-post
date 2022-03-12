<?php

namespace App\Actions\Comments;

use App\Interfaces\ICommentRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllPaginatedComments
{
    public function __construct(protected ICommentRepository $commentRepository)
    {
    }

    public function execute(int $numberOfPages): LengthAwarePaginator
    {
        return $this->commentRepository->paginate($numberOfPages);
    }
}
