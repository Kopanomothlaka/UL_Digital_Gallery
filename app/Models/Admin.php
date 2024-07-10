<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Add any additional properties or methods here

    protected $table = 'admins'; // Specify the table name if it's different

    protected $primaryKey = 'id'; // Specify the primary key if it's different

    protected $fillable = [
        'name', 'email', 'phone', // Add other fields you want to be mass assignable
    ];


}
