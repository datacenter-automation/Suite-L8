<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class ConflictException extends BaseException
{

    protected $code = Response::HTTP_CONFLICT;

    protected $message = 'Conflict';
}
