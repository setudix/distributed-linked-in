<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
class Notification extends Model
{
    protected $connection = 'mongodb3';
    protected $collection = 'notifications';

    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'read_at',
        'timestamps',
    ];

    
}
