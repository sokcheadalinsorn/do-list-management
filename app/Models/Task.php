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
<<<<<<< HEAD
        'title',
        'description',
        'status',
=======
        'user_id',
>>>>>>> 2ceec663b60be23a11833d01af6dc71db6d047e8
=======

        'user_id',
>>>>>>> e7b9947ddbdfa1124ba4de462c89cdd18d9e7d96
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}