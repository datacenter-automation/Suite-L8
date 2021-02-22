<?php

use App\Exceptions\Api\ResourceNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * @todo tweak this route to exclude development routes.
 */
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()['GET'])->map(function (
        $value,
        $key
    ) {
        return url($key);
    })->values();
});

Route::get('partials/{partial}', function ($partial) {
    if (Str::contains($partial, '_')) {
        return;
    } else {
        try {
            return view("partials.{$partial}");
        } catch (InvalidArgumentException $e) {
            return;
        }
    }
})->withoutMiddleware(['auth', 'auth:api']);

Route::post('/stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');

Route::get('/request/api-token', '\App\Http\Controllers\API\ApiTokenController')->withoutMiddleware([
    'auth',
    'auth:api',
])->middleware(['web']);

Route::post('/update-docs', [\App\Http\Controllers\API\GitHubWebhookController::class, 'handleDocsHook']);

Route::fallback(fn() => throw new ResourceNotFoundException)->name('api.fallback.404');
