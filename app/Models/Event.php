<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['hiring_form_id', 'title', 'start', 'end', 'employer_id', 'worker_id', 'user_id'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    // Event.php model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // User.php model
    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

}
