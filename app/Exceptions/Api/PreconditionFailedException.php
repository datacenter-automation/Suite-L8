<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class PreconditionFailedException extends BaseException
{

    protected $code = Response::HTTP_PRECONDITION_FAILED;

    protected $message = 'Precondition Failed';
}
