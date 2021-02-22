<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use ReflectionClass;

trait TableInformation
{
    /**
     * Return class's short name.
     *
     * @return string
     */
    public function classShortName(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }

    /**
     * Return the corresponding model's table name.
     *
     * @return string
     */
    public function table(): string
    {
        return Str::plural(strtolower($this->classShortName()));
    }

    /**
     * Return column names from model.
     *
     * @return array
     */
    public function columns(): array
    {
        return Schema::getColumnListing($this->table());
    }

    /**
     * Return a list of tables in the database.
     *
     * @return Collection
     */
    public function tables(): Collection
    {
        return collect(DB::connection()->getDoctrineSchemaManager()->listTableNames());
    }
}
