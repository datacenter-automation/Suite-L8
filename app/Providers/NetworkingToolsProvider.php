<?php

namespace App\Providers;

use App\Libraries\NetworkingTools\NetTools;
use Illuminate\Support\ServiceProvider;

class NetworkingToolsProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nettools', fn($app) => new NetTools());
    }
}
