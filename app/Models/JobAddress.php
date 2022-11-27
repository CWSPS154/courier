<?php

/**
 * PHP Version 7.4.25
 * Laravel Framework 8.83.18
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
 * Date 28/08/22
 * */

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobAddress extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_job_id',
        'type',
        'company_name',
        'street_address',
        'street_number',
        'suburb',
        'city',
        'state',
        'zip',
        'country',
        'place_id',
        'latitude',
        'longitude',
        'location_url',
        'full_json_response'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(OrderJob::class, 'order_job_id');
    }
}
