<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    // Define the fillable attributes
    protected $fillable = [
        'name',        // Add 'name' to the fillable array
        'email',       // Other fields you want to be mass-assignable
        'password',    // Password field
    ];

    // other properties and methods
}
