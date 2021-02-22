<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{

    /**
     * Update the authenticated user's API token.
     *
     * @return array
     */
    public function __invoke(): array
    {
        if (! auth()->check()) {
            redirect('/login');
        }

        auth()->user()->forceFill([
            'api_token' => hash('sha256', $token = Str::random(60)),
        ])->save();

        return ['token' => $token];
    }
}
