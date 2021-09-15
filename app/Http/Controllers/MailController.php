<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function verify(Request $request)
    {
        $data['title'] = "Welcome To Egyptus";
        $data["p"] = "Please Verify Your Account";
        Mail::send('emails.verify', $data, function($message) use($user) {

            $message->to($user->email)

                ->subject('Egyptus');
            $message->from('engMarina97@gmail.com','Egyptus');
        });

        if (Mail::failures()) {
           dd("no");
        }else{
            dd("yes");
        }

}
}
