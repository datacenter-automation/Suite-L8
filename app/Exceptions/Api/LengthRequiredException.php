<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class LengthRequiredException extends BaseException
{

    protected $code = Response::HTTP_LENGTH_REQUIRED;

    protected $message = 'Length Required';
}
