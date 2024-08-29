<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; // Ensure this matches your database table name

    protected $fillable = [
        'name', 'email', 'password', // Add 'name' here
    ];


}
