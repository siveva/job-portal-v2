<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['job_seeker_id', 'job_listing_id', 'cover_letter', 'resume', 'status'];

    public function jobSeeker()
    {
        return $this->belongsTo(User::class,'job_seeker_id','id');
    }

     public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
    
}
