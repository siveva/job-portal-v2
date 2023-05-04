<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// class CategoryJobListing extends Model
class CategoryJobListing extends Pivot

{
    use HasFactory;
    
    protected $table='category_job_listings';

}
