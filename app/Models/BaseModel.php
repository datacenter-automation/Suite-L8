<?php

namespace App\Models;

use App\Traits\TableInformation;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    use TableInformation;
}
