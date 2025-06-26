<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'rut',
        'address',
        'phone',
        'email',
        'logo',
        'description',
        'active',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
