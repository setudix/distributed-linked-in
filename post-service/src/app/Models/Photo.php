<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Photo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'photos';
    
    use HasFactory;

    protected $fillable = [
        'path',
        'post_id',
        'timestamps',
    ];
    
}
