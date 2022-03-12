<?php

namespace App\Repositories;

use App\Interfaces\ICommentRepository;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository implements ICommentRepository
{
    public function get(): Collection
    {
        return Comment::get();
    }

    public function find(int|string $id): Comment
    {
        return Comment::find($id);
    }

    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function paginate(int $numberOfPages): LengthAwarePaginator
    {
        return Comment::paginate($numberOfPages);
    }
}
