<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\TicketAttachment
 *
 * @property int                             $id
 * @property int                             $ticket_id
 * @property string                          $file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket         $ticket
 * @method static \Database\Factories\TicketAttachmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TicketAttachment extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'file_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'ticket_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Ticket::class);
    }
}
