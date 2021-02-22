<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class ForbiddenException extends BaseException
{

    protected $code = Response::HTTP_FORBIDDEN;

    protected $message = 'Forbidden';
}
