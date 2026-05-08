<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'due_date',
        'title',
        'description',
        'status',
    ];
    

    // Relationship many tasks has one users
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}


