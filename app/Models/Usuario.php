<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use Authenticatable;
    use Notifiable;

    protected $fillable = ['id', 'name', 'email', 'password', 'created_at', 'updated_at'];
}
