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
>>>>>>> 2ceec663b60be23a11833d01af6dc71db6d047e8
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}