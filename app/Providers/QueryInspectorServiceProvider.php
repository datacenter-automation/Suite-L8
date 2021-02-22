<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class QueryInspectorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        EloquentBuilder::macro('toRawSql', function () {
            $builer = $this->getQuery();

            return vsprintf(str_replace(['?'], ['\'%s\''], $builer->toSql()), $builer->getBindings());
        });

        QueryBuilder::macro('toRawSql', function () {
            return vsprintf(str_replace(['?'], ['\'%s\''], $this->toSql()), $this->getBindings());
        });
    }
}
