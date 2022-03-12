<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('comments', CommentController::class)
    ->only(['index', 'store']);
