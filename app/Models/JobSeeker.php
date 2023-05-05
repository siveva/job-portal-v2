<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
    'first_name',
    'last_name',
    'phone_number',
    'address',
    'resume',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    
}
