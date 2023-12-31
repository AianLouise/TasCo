<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerApplication extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_application';
    protected $fillable = ['resume', 'valid_id', 'barangay_clearance', 'police_clearance', 'latest_picture', 'category_id', 'user_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
