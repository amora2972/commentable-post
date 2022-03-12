<?php

namespace App\Interfaces;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface IBaseRepository
{
    public function get(): Collection;
    public function paginate(int $numberOfPages): LengthAwarePaginator;
    public function find(int|string $id): Comment;
    public function create(array $data): Comment;
}
