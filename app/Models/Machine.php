<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Machine
 *
 * @property int                                                                           $id
 * @property int                                                                           $machine_type_id
 * @property int|null                                                                      $location_id
 * @property int|null                                                                      $user_id
 * @property string                                                                        $name
 * @property \Illuminate\Support\Carbon|null                                               $deleted_at
 * @property \Illuminate\Support\Carbon|null                                               $created_at
 * @property \Illuminate\Support\Carbon|null                                               $updated_at
 * @property-read \App\Models\Location|null                                                $location
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MachineLog[]        $logs
 * @property-read int|null                                                                 $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MachineNote[]       $notes
 * @property-read int|null                                                                 $notes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SoftwareInstalled[] $softwareInstalled
 * @property-read int|null                                                                 $software_installed_count
 * @property-read \App\Models\MachineType                                                  $type
 * @property-read \App\Models\User|null                                                    $user
 * @method static \Database\Factories\MachineFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine newQuery()
 * @method static \Illuminate\Database\Query\Builder|Machine onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereMachineTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Machine withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Machine withoutTrashed()
 * @mixin \Eloquent
 */
class Machine extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_type_id',
        'location_id',
        'user_id',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
        'machine_type_id' => 'integer',
        'location_id'     => 'integer',
        'user_id'         => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MachineType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\MachineLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function softwareInstalled(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoftwareInstalled::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\MachineNote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
