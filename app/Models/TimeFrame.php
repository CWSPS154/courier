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

class TimeFrame extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'time_frames';

    /**
     * @var string[]
     */
    protected $fillable = ['time_frame',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['status' => 'boolean'];
}
