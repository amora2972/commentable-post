<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface ICommentRepository extends IBaseRepository
{
    public function getAllOrderedByLast(int $numberOfPages): LengthAwarePaginator;
}
