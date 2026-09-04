<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = false;

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
