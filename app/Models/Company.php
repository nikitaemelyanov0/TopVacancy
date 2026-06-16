<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = false;

    public function reviews()
    {
        return $this->HasMany(Review::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
