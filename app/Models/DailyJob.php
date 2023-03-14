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

use Carbon;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyJob extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'daily_jobs';

    /**
     * @var string[]
     */
    protected $fillable = ['order_job_id', 'job_number'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    public static function getTodaysJobCount(): int
    {
        return DailyJob::whereDate('created_at', Carbon\Carbon::today())->count();
    }
}
