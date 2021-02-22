<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\MachineNoteAttachment
 *
 * @property int                             $id
 * @property int                             $machine_note_id
 * @property string                          $file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MachineNote    $machineNote
 * @method static \Database\Factories\MachineNoteAttachmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment whereMachineNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MachineNoteAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MachineNoteAttachment extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_note_id',
        'file_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
        'machine_note_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machineNote(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MachineNote::class);
    }
}
