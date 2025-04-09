<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }
}
