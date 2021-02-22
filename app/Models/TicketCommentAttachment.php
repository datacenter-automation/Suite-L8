<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\TicketCommentAttachment
 *
 * @property int                             $id
 * @property int                             $ticket_comment_id
 * @property string                          $file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TicketComment  $ticketComment
 * @method static \Database\Factories\TicketCommentAttachmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment whereTicketCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketCommentAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TicketCommentAttachment extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_comment_id',
        'file_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'ticket_comment_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticketComment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TicketComment::class);
    }
}
