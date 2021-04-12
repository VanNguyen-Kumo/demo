<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
class Admin extends Authenticatable
{
    public $incrementing = false;

    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'password',

    ];
    protected $hidden = [
        'password',
    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->id = self::generateUuid();
        });
    }
    public static function generateUuid()
    {
        return Uuid::generate();
    }
}
