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

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;
    use HasUuids;

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
