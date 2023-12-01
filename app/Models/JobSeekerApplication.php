<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerApplication extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_application';
    protected $fillable = ['resume', 'valid_id', 'barangay_clearance', 'police_clearance', 'latest_picture'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
