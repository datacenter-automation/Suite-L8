<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MachineType
 *
 * @property int                                                                 $id
 * @property string                                                              $name
 * @property \Illuminate\Support\Carbon|null                                     $deleted_at
 * @property \Illuminate\Support\Carbon|null                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                     $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Machine[] $machines
 * @property-read int|null                                                       $machines_count
 * @method static \Database\Factories\MachineTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType newQuery()
 * @method static \Illuminate\Database\Query\Builder|MachineType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MachineType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MachineType withoutTrashed()
 * @mixin \Eloquent
 */
class MachineType extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function machines(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Machine::class);
    }
}
