<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'id',
        'username',
        'password',
        'is_super_admin',
    ];
    protected $hidden = [
        'password',
    ];
}
