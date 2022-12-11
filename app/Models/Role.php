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
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    use HasUuids;

    public const ADMIN = 'admin';
    public const CUSTOMER = 'customer';
    public const DRIVER = 'driver';

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'role',
        'role_identifier',
        'role_level',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['status' => 'boolean'];

    /**
     * Get the user relationship.
     *
     * @return HasMany user data
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public static function getRoleId($identifier)
    {
        $role=Role::where('role_identifier',$identifier)->firstOrFail();
        return $role->id;
    }
}
