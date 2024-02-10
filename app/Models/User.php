<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        "phone",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => \App\Enums\UserType::class,
    ];

    // relations

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Service::class, 'bookings', 'user_id', 'service_id');
    }

    // attributes

    protected function password(): Attribute
    {
        return Attribute::make(
            set:fn($value) => bcrypt($value),
        );
    }

    public function getRoleAttribute()
    {
        return $this->roles->first()->id;
    }
}
