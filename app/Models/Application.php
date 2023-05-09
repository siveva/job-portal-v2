<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function jobSeeker()
    {
        return $this->belongsTo(User::class,'job_seeker_id','id');
    }

     public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
    
}
