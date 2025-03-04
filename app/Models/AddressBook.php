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

class AddressBook extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'address_books';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id',
        'company_name',
        'street_address',
        'street_number',
        'suburb',
        'city',
        'state',
        'zip',
        'country',
        'place_id',
        'area_id',
        'latitude',
        'longitude',
        'location_url',
        'full_json_response',
        'status',
        'set_as_default'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['status' => 'boolean', 'set_as_default' => 'boolean'];

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
}
