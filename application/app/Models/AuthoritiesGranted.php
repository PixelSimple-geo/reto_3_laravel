<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthoritiesGranted extends Model
{
    use HasFactory;

    protected $table = 'authorities_granted';
    protected $fillable = ['authorities_id', 'users_id'];
}
