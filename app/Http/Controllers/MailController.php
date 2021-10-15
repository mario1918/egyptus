<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function verifyMail(User $user)
    {
        $data['title'] = "Welcome To Egyptus";
        $data["p"] = "Please Verify Your Account";
        Mail::send('emails.verify', compact(['data','user']), function($message) use($user) {

            $message->to($user->email)

                ->subject('Egyptus');
            $message->from('engMarina97@gmail.com','Egyptus');
        });

        if (Mail::failures()) {
            return "Please try again later";
        }
}
}
