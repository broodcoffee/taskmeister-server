<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email_address',
        'password',
        'access_type',
    ];

    public function project() {
        return $this->hasMany(Project::class);
    }

    public function task() {
        return $this->belongsToMany(Task::class);
    }
}
