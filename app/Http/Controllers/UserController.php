<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserDashboard(){
        return view("user.dashboard");
    }
    
    public function UserChatify(){
        return view("user.chatify");
    }
}
