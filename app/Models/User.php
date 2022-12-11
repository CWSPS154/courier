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

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Wildside\Userstamps\Userstamps;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class User extends Authenticatable implements
    AuthenticatableContract,
    CanResetPasswordContract,
    MustVerifyEmail
{
    use \Illuminate\Auth\Authenticatable;
    use CanResetPassword;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use Userstamps;
    use CascadeSoftDeletes;
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'role_id',
        'is_admin',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * @var array|string[]
     */
    protected array $cascadeDeletes = ['customer','driver','jobs','jobAssigns','customerContacts','defaultAddress'];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->is_admin == 1;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role_id == Role::getRoleId(Role::ADMIN);
    }

    /**
     * @return bool
     */
    public function isCustomer(): bool
    {
        return $this->role_id == Role::getRoleId(Role::CUSTOMER);
    }

    /**
     * @return bool
     */
    public function isDriver(): bool
    {
        return $this->role_id == Role::getRoleId(Role::DRIVER);
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * @return HasOne
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * @return HasOne
     */

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }

    /**
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(OrderJob::class,'user_id','id');
    }

    /**
     * @return HasMany
     */
    public function jobAssigns(): HasMany
    {
        return $this->hasMany(JobAssign::class);
    }

    /**
     * @return HasMany
     */
    public function customerContacts(): HasMany
    {
        return $this->hasMany(CustomerContact::class);
    }

    /**
     * @return HasOne
     */
    public function defaultAddress(): HasOne
    {
        return $this->hasOne(AddressBook::class)->where('status', true)->where('set_as_default', true);
    }

    /**
     * Get the class being used to provide a User.
     *
     * @return string
     */
    protected function getUserClass(): string
    {
        return config('auth.providers.user.model');
    }
}
