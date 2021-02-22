<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\AuthLog
 *
 * @property int                             $id
 * @property int                             $user_id
 * @property int                             $blame_on_user_id
 * @property string|null                     $ip_address
 * @property string|null                     $session_id
 * @property string|null                     $user_agent
 * @property bool                            $killed_from_console
 * @property int|null                        $logged_out_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User           $blameOnUser
 * @property-read \App\Models\User           $user
 * @method static \Database\Factories\AuthLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereBlameOnUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereKilledFromConsole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereLoggedOutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthLog whereUserId($value)
 * @mixin \Eloquent
 */
class AuthLog extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'blame_on_user_id',
        'ip_address',
        'session_id',
        'user_agent',
        'killed_from_console',
        'logged_out_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                  => 'integer',
        'user_id'             => 'integer',
        'killed_from_console' => 'boolean',
        'logged_out_at'       => 'timestamp',
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
    public function blameOnUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
