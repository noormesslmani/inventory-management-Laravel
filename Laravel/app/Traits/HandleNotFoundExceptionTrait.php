<?php

namespace App\Traits;
use App\Exceptions\NotFoundException;


trait HandleNotFoundExceptionTrait
{
    public function handleNotFoundException(): array
    {
        $exception = new NotFoundException();
        return $exception->render();
    }
}