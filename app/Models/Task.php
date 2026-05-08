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
        'title',
        'description',
        'status'
    ];
    


    public function users()
    {
        return $this->belongsTo(User::class);
    }

}

