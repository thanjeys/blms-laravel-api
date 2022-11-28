<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Role associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the Products associated with the user.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the Co-Ordinator of associated with the Telecaller / Backend.
     */
    public function coordinator()
    {
        if ($this->role_id == 1) { //  Telecaller
            return $this->hasOne(CoordinatorRelation::class, 'rel_user_id', 'id')
            ->where('rel_type', 'telecaller');

        } else if ($this->role_id == 2) { // Backend

            return $this->hasOne(CoordinatorRelation::class, 'rel_user_id', 'id')
            ->where('rel_type', 'backend');

        } else { // No Ordinator

            return $this->hasOne(CoordinatorRelation::class, 'rel_user_id', 'id')
            ->where('rel_type', 'NoCordinator');
        }
    }


    public function isAdmin()
    {
        return $this->role->slug == 'admin' ? true : false;
    }



}
