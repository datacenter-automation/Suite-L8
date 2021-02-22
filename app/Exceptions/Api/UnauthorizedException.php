<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends BaseException
{

    protected $code = Response::HTTP_UNAUTHORIZED;

    protected $message = 'Unauthorized';
}
