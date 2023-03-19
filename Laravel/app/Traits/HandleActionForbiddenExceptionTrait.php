<?php

namespace App\Traits;
use App\Exceptions\ActionForbiddenException;

trait HandleActionForbiddenExceptionTrait
{
    public function handleActionForbiddenException(): array
    {
        $exception = new ActionForbiddenException();
        return $exception->render();
    }
}