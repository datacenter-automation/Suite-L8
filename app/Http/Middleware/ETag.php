<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ETag
{
    /**
     * @var string
     */
    protected string $etag;

    /**
     * @var string
     */
    protected string $initialMethod;

    /**
     * @var string|string[]
     */
    protected $requestEtag;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->isMethod('get') && ! $request->isMethod('head')) {
            return $next($request);
        }

        $this->initialMethod = $this->getMethodFromClient();

        $request->setMethod('get');

        $this->ifNoneMatchFromCache($request);

        $response = $next($request);

        $this->etag = $this->generateETag($response);

        $this->requestEtag = $this->loadETag();

        $this->hasEtagChanged();

        $response->setEtag($this->etag);

        $request->setMethod($this->initialMethod);

        return $response;
    }

    /**
     * Generate Etag.
     *
     * @param \Illuminate\Http\Response|\Illuminate\Http\JsonResponse $response
     *
     * @return string
     */
    protected function generateETag($response)
    {
        /*
         * @var \Illuminate\Http\Response|\Illuminate\Http\JsonResponse $response
         */

        return '/'.\Request::path().':'.hash('sha256', json_encode($response->headers->get('origin')).$response->getContent());
    }

    /**
     * Get the HTTP verb from client.
     *
     * @return string
     */
    protected function getMethodFromClient()
    {
        return request()->method();
    }

    /**
     * Has the Etag Changed?
     */
    protected function hasEtagChanged()
    {
        if ($this->requestEtag && $this->requestEtag[0] == $this->etag) {
            Response::setNotModified();
        }
    }

    /**
     * If the header is cached, get the data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|object
     */
    protected function ifNoneMatchFromCache(Request $request)
    {
        if ($request->headers->has('If-None-Match')) {
            $etag = $request->headers->get('If-None-Match');

            if (\Cache::has($etag)) {
                return (new Response)->setStatusCode(304);
            }
        }
    }

    /**
     * Load the Etag.
     *
     * @return string|string[]
     */
    protected function loadETag()
    {
        return str_replace('"', '', request()->getETags());
    }
}

//function getProduct(ServerRequestInterface $request, ResponseInterface $response, $args)
//{
//    $id = $args['id'];
//    $product = $this->productRepository->load($id);
//
//    $etag = hash('sha256', sprintf('product-%d-%d', $product->id, $product->updated_at));
//
//    $this->cache->set($etag, $id);
//
//    $response = $response->withHeader('ETag', $etag);
//    $response->getBody()->write(json_encode($product));
//    return $response;
//}
