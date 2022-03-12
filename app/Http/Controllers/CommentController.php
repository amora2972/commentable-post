<?php

namespace App\Http\Controllers;

use App\Actions\Comments\CreateComment;
use App\Actions\Comments\GetAllPaginatedComments;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function index(
        GetAllPaginatedComments $getAllPaginatedComments
    ): JsonResponse
    {
        $comments = $getAllPaginatedComments->execute(5);
        return $this->success(data: CommentResource::collection($comments));
    }

    public function store(
        CreateCommentRequest $request,
        CreateComment        $createComment
    ): JsonResponse
    {
        $comment = $createComment->execute($request->validated());
        return $this->success(
            data: (new CommentResource($comment))
        );
    }
}
