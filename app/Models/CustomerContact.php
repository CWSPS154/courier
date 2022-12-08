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
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerContact extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'customer_contacts';
    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'customer_contact'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];
}
