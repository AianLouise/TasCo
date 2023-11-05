<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatifyController extends Controller
{
    public function chatify(){
        return view('chatify'); // Adjust the view name as needed
    }

}
