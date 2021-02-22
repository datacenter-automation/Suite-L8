<?php

namespace App\Builder;

use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{

    /**
     * @param string         $slug
     * @param array|string[] $columns
     *
     * @return $this
     */
    public function findBySlug(string $slug, array $columns = ['*'])
    {
        $this->where('slug', $slug)->first($columns);

        return $this;
    }

    /**
     * @param string         $name
     * @param array|string[] $columns
     *
     * @return $this
     */
    public function findByName(string $name, array $columns = ['*'])
    {
        $this->where('name', $name)->first($columns);

        return $this;
    }
}
