<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\LocationGroup
 *
 * @property int                                                                  $id
 * @property string                                                               $name
 * @property string|null                                                          $description
 * @property \Illuminate\Support\Carbon|null                                      $deleted_at
 * @property \Illuminate\Support\Carbon|null                                      $created_at
 * @property \Illuminate\Support\Carbon|null                                      $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $locations
 * @property-read int|null                                                        $locations_count
 * @method static \Database\Factories\LocationGroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|LocationGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|LocationGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LocationGroup withoutTrashed()
 * @mixin \Eloquent
 */
class LocationGroup extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Location::class);
    }
}
