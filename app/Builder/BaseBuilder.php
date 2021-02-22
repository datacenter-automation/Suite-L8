<?php

namespace App\Builder;

use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{

    /**
     * @param string $slug
     * @param array  $columns
     *
     * @return \App\Builder\BaseBuilder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findBySlug(string $slug, array $columns = ['*'])
    {
        return $this->where('slug', $slug)->first($columns);
    }
}
