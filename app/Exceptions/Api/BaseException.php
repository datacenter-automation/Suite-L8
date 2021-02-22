<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ReflectionClass;

class BaseException extends Exception
{

    /**
     * Get trace identifier.
     *
     * @return string
     * @throws \ReflectionException
     */
    final public function getTraceId(): string
    {
        return sprintf('API_%s_%s_%s', $this->prepareClassShortcut(), $this->preparePathShortcut(), time());
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \ReflectionException
     */
    final public function render(Request $request)
    {
        return response()->json([
            'error' => [
                'message' => self::getMessage(),
                'type'    => get_class($this),
                'code'    => self::getCode(),
                'traceid' => self::getTraceId(),
            ],
        ], self::getCode());
    }

    /**
     * Get shortened class identifier.
     *
     * @return string|string[]|null
     * @throws \ReflectionException
     */
    final protected function prepareClassShortcut()
    {
        return preg_replace('/[^A-Z]/', '', str_replace('Exception', '', (new ReflectionClass($this))->getShortName()));
    }

    /**
     * Get shortened path identifier.
     *
     * @return string
     */
    final protected function preparePathShortcut(): string
    {
        return Str::camel(str_replace('/', '_', request()->path()));
    }
}
