<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'task_name',
        'status',
        'due_date',
        'priority',   
    ];
    

    // Relationship many tasks has one users
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}


