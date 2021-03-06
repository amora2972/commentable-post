<?php

namespace App\Rules;

use App\Interfaces\NestableInterface;
use Illuminate\Contracts\Validation\Rule;

class NestedChecker implements Rule
{
    public function __construct(
        protected NestableInterface $repo,
        protected int|string|null        $parentId
    )
    {
    }

    public function passes($attribute, $value)
    {
        if (!$this->parentId) {
            return true;
        }
        return $this->repo->checkNested($this->parentId);
    }

    public function message()
    {
        return __('validation.check_nested');
    }
}
