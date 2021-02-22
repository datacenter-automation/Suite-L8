<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Logger
 *
 * @property int                             $id
 * @property string                          $method
 * @property string                          $controller
 * @property string                          $action
 * @property array                           $parameter
 * @property array                           $headers
 * @property string                          $origin_ip_address
 * @property int                             $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User           $user
 * @method static \Database\Factories\LoggerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereOriginIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logger whereUserId($value)
 * @mixin \Eloquent
 */
class Logger extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'method',
        'controller',
        'action',
        'parameter',
        'headers',
        'origin_ip_address',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'parameter' => 'array',
        'headers'   => 'array',
        'user_id'   => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
