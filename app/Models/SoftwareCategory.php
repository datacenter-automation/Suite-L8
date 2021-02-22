<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SoftwareCategory
 *
 * @property int                                                                  $id
 * @property string                                                               $name
 * @property \Illuminate\Support\Carbon|null                                      $deleted_at
 * @property \Illuminate\Support\Carbon|null                                      $created_at
 * @property \Illuminate\Support\Carbon|null                                      $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Software[] $software
 * @property-read int|null                                                        $software_count
 * @method static \Database\Factories\SoftwareCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|SoftwareCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftwareCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SoftwareCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SoftwareCategory withoutTrashed()
 * @mixin \Eloquent
 */
class SoftwareCategory extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function software(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Software::class);
    }
}
