<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['hiring_form_id', 'title', 'start', 'end', 'employer_id', 'worker_id', 'user_id', 'status'];

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

    public function hiringForm()
    {
        return $this->belongsTo(HiringForm::class, 'hiring_form_id');
    }

    public function getDayTextAttribute()
    {
        // Get the events for the same hiring form and order them by start date
        $orderedEvents = $this->hiringForm->events()->orderBy('start')->get();

        // Find the index of the current event in the ordered list
        $index = $orderedEvents->search(function ($item) {
            return $item->id == $this->id;
        });

        // If the index is found, add "Day" and the incremented number to the title
        return $index !== false ? 'Day ' . ($index + 1) : '';
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'id', 'event_id'); // Adjust column names accordingly
    }

    public function employments()
    {
        return $this->belongsTo(Employment::class);
    }

}
