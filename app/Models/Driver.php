<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Model
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    public const DRIVER_ID_PREFIX = 'DID';

    /**
     * @var string
     */
    protected $table = 'drivers';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'driver_id', 'area_id', 'pager_number', 'company_email', 'company_driver'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['company_driver' => 'boolean'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function createIncrementDriverId(int $id): string
    {
        return self::DRIVER_ID_PREFIX.str_pad($id, 5, 0, STR_PAD_LEFT);
    }
}
