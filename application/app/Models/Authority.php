<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    use HasFactory;

    protected $fillable = ['rol'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'authorities_granted', 'authorities_id', 'users_id');
    }
}
