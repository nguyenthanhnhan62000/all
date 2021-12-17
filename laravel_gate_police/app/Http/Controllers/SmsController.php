<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Notifications\Messages\NexmoMessage;

class SmsController extends Controller
{
    public function index(){

        Nexmo::message()->send([
            'to' => '84337376811',
            'from' => 'sender',
            'text' => 'Test SMS'
        ]);

        echo 'Message sent!';
      
    }
}
