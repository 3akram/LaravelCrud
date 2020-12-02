<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'city',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var string[]
     */
    protected $hidden   = [
        'created_at',
        'updated_at'
    ];
}
