<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MachineLog
 *
 * @property int                             $id
 * @property int                             $machine_id
 * @property int                             $user_id
 * @property string                          $content
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Machine        $machine
 * @property-read \App\Models\User           $user
 * @method static \Database\Factories\MachineLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|MachineLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereMachineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|MachineLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MachineLog withoutTrashed()
 * @mixin \Eloquent
 */
class MachineLog extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_id',
        'user_id',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'machine_id' => 'integer',
        'user_id'    => 'integer',
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
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
