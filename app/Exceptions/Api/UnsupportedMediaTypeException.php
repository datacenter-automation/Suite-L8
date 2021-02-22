<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedMediaTypeException extends BaseException
{

    protected $code = Response::HTTP_UNSUPPORTED_MEDIA_TYPE;

    protected $message = 'Unsupported Media Type';
}
