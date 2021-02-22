<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Ticket
 *
 * @property int                                                                          $id
 * @property int                                                                          $user_id
 * @property int                                                                          $status_id
 * @property string                                                                       $content
 * @property int                                                                          $read
 * @property \Illuminate\Support\Carbon|null                                              $deleted_at
 * @property \Illuminate\Support\Carbon|null                                              $created_at
 * @property \Illuminate\Support\Carbon|null                                              $updated_at
 * @property-read \App\Models\TicketStatus                                                $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketAttachment[] $ticketAttachments
 * @property-read int|null                                                                $ticket_attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketComment[]    $ticketComments
 * @property-read int|null                                                                $ticket_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketLog[]        $ticketLogs
 * @property-read int|null                                                                $ticket_logs_count
 * @property-read \App\Models\TicketStatus|null                                           $ticketStatus
 * @property-read \App\Models\TicketWorker|null                                           $ticketWorker
 * @property-read \App\Models\User                                                        $user
 * @method static \Database\Factories\TicketFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Query\Builder|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Ticket withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ticket withoutTrashed()
 * @mixin \Eloquent
 */
class Ticket extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status_id',
        'content',
        'read',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'user_id'   => 'integer',
        'status_id' => 'integer',
        'read'      => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TicketStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketAttachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\TicketAttachment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketComments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\TicketComment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketLogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\TicketLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketStatus(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\TicketStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketWorker(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\TicketWorker::class);
    }
}
