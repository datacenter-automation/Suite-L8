<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Orbit\Concerns\Orbital;
use Orbit\Concerns\SoftDeletes;

abstract class BaseFileModel extends Model
{

    use Orbital, SoftDeletes;

    /**
     * @var string
     */
    public static $driver = 'json';
}
