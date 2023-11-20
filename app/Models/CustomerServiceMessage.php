<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerServiceMessage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject', 'message', 'reply_message'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


}
