<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'books';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
