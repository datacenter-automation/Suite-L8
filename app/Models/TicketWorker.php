<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TicketWorker
 *
 * @property int                                                                $id
 * @property int                                                                $ticket_id
 * @property int                                                                $user_id
 * @property \Illuminate\Support\Carbon|null                                    $deleted_at
 * @property \Illuminate\Support\Carbon|null                                    $created_at
 * @property \Illuminate\Support\Carbon|null                                    $updated_at
 * @property-read \App\Models\Ticket                                            $ticket
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null                                                      $tickets_count
 * @property-read \App\Models\User                                              $user
 * @method static \Database\Factories\TicketWorkerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker newQuery()
 * @method static \Illuminate\Database\Query\Builder|TicketWorker onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketWorker whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|TicketWorker withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TicketWorker withoutTrashed()
 * @mixin \Eloquent
 */
class TicketWorker extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Ticket::class);
    }

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
