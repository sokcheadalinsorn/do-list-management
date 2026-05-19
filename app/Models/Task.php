<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'status',
        'priority',
        'due_date',
        'priority',   
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}