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

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    public const CUSTOMER_ID_PREFIX = 'CID';

    /**
     * @var string
     */
    protected $table = 'customers';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'company_name', 'customer_id', 'area_id'];

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

    public function createIncrementCustomerId(int $id): string
    {
        return self::CUSTOMER_ID_PREFIX.str_pad($id, 5, 0, STR_PAD_LEFT);
    }
}
