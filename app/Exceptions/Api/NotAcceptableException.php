<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class NotAcceptableException extends BaseException
{

    protected $code = Response::HTTP_NOT_ACCEPTABLE;

    protected $message = 'Not Acceptable';
}
