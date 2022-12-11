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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class JobStatusHistory extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;
    use InteractsWithMedia;

    public const DEFAULT_IMAGE='/images/default/camera.png';

    /**
     * @var string
     */
    protected $table = 'job_status_histories';

    /**
     * @var string[]
     */
    protected $fillable = ['area',
        'order_job_id',
        'user_id',
        'from_status_id',
        'to_status_id',
        'comment',
        ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return BelongsTo
     */
    public function job(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrderJob::class,'order_job_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function fromStatus(): BelongsTo
    {
        return $this->belongsTo(JobStatus::class,'from_status_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function toStatus(): BelongsTo
    {
        return $this->belongsTo(JobStatus::class,'to_status_id','id');
    }

    /**
     * Media conversion to avatar.
     *
     * @param Media|null $media The media
     *
     * @return void
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('base-image')
            ->crop('crop-center', 750, 400);
        $this->addMediaConversion('thumbnail')
            ->crop('crop-center', 270, 261);
    }

    /**
     * Register media collection.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('job_status_images')
            ->singleFile()
            ->useFallbackUrl(self::DEFAULT_IMAGE)
            ->useFallbackPath(public_path(self::DEFAULT_IMAGE));
    }
}
