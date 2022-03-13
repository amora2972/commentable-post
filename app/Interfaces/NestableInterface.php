<?php

namespace App\Interfaces;

interface NestableInterface
{
    public function checkNested(int|string $parentId): bool;
}
