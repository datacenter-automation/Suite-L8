<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Upload
 *
 * @property int                             $id
 * @property string                          $filename_uniqid
 * @property int                             $user_id
 * @property string                          $filename
 * @property array                           $file_attibutes
 * @property int|null                        $encrypted_at
 * @property string                          $uploader_ip_address
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User           $user
 * @method static \Database\Factories\UploadFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Query\Builder|Upload onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereEncryptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFileAttibutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFilenameUniqid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploaderIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Upload withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Upload withoutTrashed()
 * @mixin \Eloquent
 */
class Upload extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename_uniqid',
        'user_id',
        'filename',
        'file_attibutes',
        'encrypted_at',
        'uploader_ip_address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'integer',
        'user_id'        => 'integer',
        'file_attibutes' => 'array',
        'encrypted_at'   => 'timestamp',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
