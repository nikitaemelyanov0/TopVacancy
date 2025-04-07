<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{

    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
