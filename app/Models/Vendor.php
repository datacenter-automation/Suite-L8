<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;
use Musonza\Chat\Traits\Messageable;

class Vendor extends Model
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
