<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Musonza\Chat\Traits\Messageable;

class Internal extends Model
{

    use HasFactory, Messageable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'internal';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
