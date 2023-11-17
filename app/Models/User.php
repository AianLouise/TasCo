<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\NewResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\NewEmailVerificationNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token){
        $this->notify(new NewResetPasswordNotification($token));
    }
    
    public function sendEmailVerificationNotification(){
        $this->notify(new NewEmailVerificationNotification);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'address',
        'email',
        'password',
        'messenger_color',
        'role',
        'avatar',
        'fname',
        'lname',
        'category',
        'verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
