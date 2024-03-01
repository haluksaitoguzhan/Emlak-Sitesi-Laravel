<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Userr extends Authenticatable
{
    protected $table = 'users';
    protected $guard = 'myuser';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
