<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
<<<<<<< HEAD
        'title',
        'description',
        'status',
=======
        'user_id',
>>>>>>> d8419d186db20052513ca810942d85b4d81a007f
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}