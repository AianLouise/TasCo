<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = ['hiring_form_id', 'job_description', 'start_date', 'end_date', 'image1', 'image2', 'image3', 'event_id', 'status'];

    public function hiringForm()
    {
    return $this->belongsTo(HiringForm::class);
    }


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
