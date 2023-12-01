<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'valid_id',
        'barangay_clearance',
        'latest_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
