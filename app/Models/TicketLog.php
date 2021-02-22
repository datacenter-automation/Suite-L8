<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TicketLog
 *
 * @property int                             $id
 * @property int                             $ticket_id
 * @property int                             $user_id
 * @property string                          $content
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket         $ticket
 * @property-read \App\Models\User           $user
 * @method static \Database\Factories\TicketLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|TicketLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|TicketLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TicketLog withoutTrashed()
 * @mixin \Eloquent
 */
class TicketLog extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'user_id',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'ticket_id' => 'integer',
        'user_id'   => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
