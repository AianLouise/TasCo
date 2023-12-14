<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SosAlert extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'location', 'time', 'status', 'details' , 'latitude', 'longitude'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
