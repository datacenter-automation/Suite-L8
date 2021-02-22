<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Musonza\Chat\Traits\Messageable;

class Whitegloves extends Model
{

    use HasFactory, Messageable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_name',
        'email',
        'password',
    ];
}
