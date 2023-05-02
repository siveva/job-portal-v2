<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

     public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
    
}
