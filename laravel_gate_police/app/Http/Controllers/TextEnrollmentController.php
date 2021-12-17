<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TestEnrollment;
use Illuminate\Support\Facades\Notification;

class TextEnrollmentController extends Controller
{
    public function sendTextNotification(){

        $user = User::first();
        
        $enrollmentData = [
            'body' =>'You received an new test notification',
            'enrollmentText' =>'You are allowed to enroll',
            'url' => url('/'),
            'thankyou' => 'You have 14 days to enroll',
        ];
        // $user->notify(new TestEnrollment($enrollmentData));
        Notification::send($user, new TestEnrollment($enrollmentData));
    }
}
