<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'ISBN',
        'description',
        'year',
        'cover_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
