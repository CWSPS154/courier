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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class OrderJob extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    public const JOB_ID_PREFIX = 'JOB';

    /**
     * @var string
     */
    protected $table = 'order_jobs';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id',
        'customer_contact_id',
        'from_area_id',
        'to_area_id',
        'timeframe_id',
        'notes',
        'van_hire',
        'number_box',
        'job_increment_id',
        'status_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['van_hire' => 'boolean'];

    /**
     * @var array|string[]
     */
    protected array $cascadeDeletes = ['fromAddress', 'toAddress', 'jobAssign', 'dailyJob'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($job) {
            $job->fromAddress()->delete();
            $job->toAddress()->delete();
            $job->jobAssign()->delete();
            $job->dailyJob()->delete();
        });
    }

    public function fromAddress(): HasOne
    {
        return $this->hasOne(JobAddress::class)->where('type', 'from');
    }

    public function toAddress(): HasOne
    {
        return $this->hasOne(JobAddress::class)->where('type', 'to');
    }

    public function jobAssign(): HasOne
    {
        return $this->hasOne(JobAssign::class, 'order_job_id', 'id');
    }

    public function dailyJob(): HasOne
    {
        return $this->HasOne(DailyJob::class, 'order_job_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fromArea(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'from_area_id');
    }

    public function toArea(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'to_area_id');
    }

    public function timeFrame(): BelongsTo
    {
        return $this->belongsTo(TimeFrame::class, 'timeframe_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(JobStatus::class, 'status_id');
    }

    public function customerContact(): BelongsTo
    {
        return $this->belongsTo(CustomerContact::class, 'customer_contact_id');
    }

    public function jobStatusHistory(): HasMany
    {
        return $this->hasMany(JobStatusHistory::class, 'order_job_id', 'id');
    }

    public function createIncrementJobId(int|string $id): string
    {
        return self::JOB_ID_PREFIX.str_pad($id, 5, 0, STR_PAD_LEFT);
    }

    /**
     * Get the class being used to provide a User.
     */
    protected function getUserClass(): string
    {
        return config('auth.providers.user.model');
    }

    public static function getJobsCount($user_id)
    {
        if ($user_id) {
            return OrderJob::where('user_id', $user_id)->count();
        }
    }
}
