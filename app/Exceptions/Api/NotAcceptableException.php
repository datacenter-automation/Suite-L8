<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class MethodNotAllowedException extends BaseException
{

    protected $code = Response::HTTP_METHOD_NOT_ALLOWED;

    protected $message = 'Method Not Allowed';
}
