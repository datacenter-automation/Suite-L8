<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TicketComment
 *
 * @property int                                                                                 $id
 * @property int                                                                                 $ticket_id
 * @property int                                                                                 $user_id
 * @property string                                                                              $content
 * @property \Illuminate\Support\Carbon|null                                                     $deleted_at
 * @property \Illuminate\Support\Carbon|null                                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                                     $updated_at
 * @property-read \App\Models\Ticket                                                             $ticket
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketCommentAttachment[] $ticketCommentAttachments
 * @property-read int|null                                                                       $ticket_comment_attachments_count
 * @property-read \App\Models\User                                                               $user
 * @method static \Database\Factories\TicketCommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment newQuery()
 * @method static \Illuminate\Database\Query\Builder|TicketComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|TicketComment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TicketComment withoutTrashed()
 * @mixin \Eloquent
 */
class TicketComment extends Model
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketCommentAttachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\TicketCommentAttachment::class);
    }
}
