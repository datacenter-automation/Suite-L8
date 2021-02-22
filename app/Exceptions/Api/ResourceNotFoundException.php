<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class ResourceNotFoundException extends BaseException
{

    protected $code = Response::HTTP_NOT_FOUND;

    protected $message = 'Not Found';
}
