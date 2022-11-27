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

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;

//    const ORDER_PLACED = 1;
//    const DELIVERY_ACCEPTED = 2;
//    const DELIVERY_REJECTED = 3;
//    const ORDER_DELIVERED = 4;
//    const DELIVERY_PENDING = 5;

    const NEW_JOB='new_job';
    const ASSIGNED='assigned';
    const ACCEPTED='accepted';
    const REJECTED='rejected';
    const PICKED_UP='picked_up';
    const DELIVERED='delivered';
    const CANCELLED='cancelled';

    /**
     * @var string
     */
    protected $table = 'job_status';

    /**
     * @var string[]
     */
    protected $fillable = ['status',
        'identifier'
    ];

    public static function getStatusId($identifier)
    {
        $job_status=JobStatus::where('identifier',$identifier)->firstOrFail();
        return $job_status->id;
    }
}
