<?php

namespace App\Repositories;

use App\Interfaces\ICommentRepository;
use App\Interfaces\NestableInterface;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository implements ICommentRepository, NestableInterface
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

    public function getAllOrderedByLast(int $numberOfPages): LengthAwarePaginator
    {
        return Comment::with(['children' => fn ($q) => $q->with(['children' => fn($q) => $q->with('children')])])
            ->where('parent_id', null)
            ->orderBy('created_at', 'desc')
            ->paginate($numberOfPages);
    }

    public function checkNested(int|string $parentId): bool
    {
        return !Comment::where('comments.id', $parentId)
            ->whereHas('parent', function($q) {
                $q->whereHas('parent');
            })->count();
    }
}
