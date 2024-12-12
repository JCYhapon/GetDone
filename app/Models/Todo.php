<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    // Add 'title' to the $fillable array
    protected $fillable = ['title', 'completed', 'user_id'];
}
