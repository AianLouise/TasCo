<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['hiring_form_id', 'title', 'start', 'end', 'employer_id', 'worker_id'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
