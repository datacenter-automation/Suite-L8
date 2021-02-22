<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class BadRequestException extends BaseException
{

    protected $code = Response::HTTP_BAD_REQUEST;

    protected $message = 'Bad Request';
}
