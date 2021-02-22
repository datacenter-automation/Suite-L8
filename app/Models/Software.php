<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Software
 *
 * @property int                                                                           $id
 * @property string                                                                        $name
 * @property string                                                                        $key
 * @property \Illuminate\Support\Carbon|null                                               $deleted_at
 * @property \Illuminate\Support\Carbon|null                                               $created_at
 * @property \Illuminate\Support\Carbon|null                                               $updated_at
 * @property-read \App\Models\SoftwareCategory|null                                        $softwareCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SoftwareInstalled[] $softwareInstalled
 * @property-read int|null                                                                 $software_installed_count
 * @method static \Database\Factories\SoftwareFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Software newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Software newQuery()
 * @method static \Illuminate\Database\Query\Builder|Software onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Software query()
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Software whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Software withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Software withoutTrashed()
 * @mixin \Eloquent
 */
class Software extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function softwareInstalled(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoftwareInstalled::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function softwareCategory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\SoftwareCategory::class);
    }
}
