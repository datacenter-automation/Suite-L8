<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function get();

    public function find(int $id);
}
