<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        // Add more columns as needed
    ];

    // Define relationship with services
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
