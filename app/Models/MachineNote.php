<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MachineNote
 *
 * @property int                                                                               $id
 * @property int                                                                               $machine_id
 * @property string                                                                            $content
 * @property \Illuminate\Support\Carbon|null                                                   $deleted_at
 * @property \Illuminate\Support\Carbon|null                                                   $created_at
 * @property \Illuminate\Support\Carbon|null                                                   $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MachineNoteAttachment[] $attachments
 * @property-read int|null                                                                     $attachments_count
 * @property-read \App\Models\Machine                                                          $machine
 * @method static \Database\Factories\MachineNoteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|MachineNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereMachineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MachineNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MachineNote withoutTrashed()
 * @mixin \Eloquent
 */
class MachineNote extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_id',
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
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Machine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\MachineNoteAttachment::class);
    }
}
