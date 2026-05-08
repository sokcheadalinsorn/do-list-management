<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
        protected $table = 'users';

        protected $primaryKey = 'id';

        protected $fillable = [
            'full_name',
            'email',
            'password',
        ];
    

     // Relationship one users has many tasks
    public function tasks()
    {
        return $this->HasMany(Task::class);
    }
}
