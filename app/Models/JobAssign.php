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

class JobAssign extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;

//    const ASSIGNED = 1;
//    const NOT_ASSIGNED = -1;
//    const JOB_ACCEPTED = 2;
//    const JOB_REJECTED = 3;

    /**
     * @var string
     */
    protected $table = 'job_assigns';

    /**
     * @var string[]
     */
    protected $fillable = ['order_job_id',
        'user_id'
    ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
