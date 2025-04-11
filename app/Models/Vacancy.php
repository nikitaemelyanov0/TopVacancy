<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function resumes()
    {
        return $this->belongsToMany(Resume::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
