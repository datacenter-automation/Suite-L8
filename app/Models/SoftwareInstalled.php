<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SoftwareInstalled
 *
 * @property-read \App\Models\Machine  $machine
 * @property-read \App\Models\Software $software
 * @method static \Database\Factories\SoftwareInstalledFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareInstalled newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareInstalled newQuery()
 * @method static \Illuminate\Database\Query\Builder|SoftwareInstalled onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareInstalled query()
 * @method static \Illuminate\Database\Query\Builder|SoftwareInstalled withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SoftwareInstalled withoutTrashed()
 * @mixin \Eloquent
 */
class SoftwareInstalled extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'software_id',
        'machine_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'software_id' => 'integer',
        'machine_id'  => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Machine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function software(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Software::class);
    }
}
