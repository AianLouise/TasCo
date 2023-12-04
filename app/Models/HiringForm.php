<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiringForm extends Model
{
    use HasFactory;

    protected $table = 'hiring_forms';

    protected $fillable = [
        'employer_id',
        'worker_id',
        'address',
        'date',
        'time',
        'subject',
        'description',
        'status'
    ];

    // HiringForm.php

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'hiring_form_id');
    }
}
