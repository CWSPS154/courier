<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Model
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'areas';

    /**
     * @var string[]
     */
    protected $fillable = ['area',
        'zone_id',
        'dispatch',
        'status'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['status' => 'boolean'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return mixed
     */

    /**
     * @return HasMany
     */
    public function fromJobs(): HasMany
    {
        return $this->hasMany(OrderJob::class,'from_area_id','id');
    }

    /**
     * @return HasMany
     */
    public function toJobs(): HasMany
    {
        return $this->hasMany(OrderJob::class,'to_area_id','id');
    }

    public static function getAreas()
    {
        return Area::where('status', true)->pluck('area', 'id')->toArray();
    }

    /**
     * @return HasOne
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * @return HasOne
     */
    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }
}
