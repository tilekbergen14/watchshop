<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'released_year',
        'country',
        'type',
        'image',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
