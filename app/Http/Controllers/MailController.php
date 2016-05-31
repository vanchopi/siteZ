<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use App\Phones;

class MailController extends Controller
{
    public function sendmail(Request $request)
    {
        /*
        $user = $request->email;
        Mail::send('emails.admin', ['name' => $request->name, 'email' => $request->email ,'text' => $request->text], function ($message) use ($user){
            $message->from($user, 'CROSSFIT');

            $message->to('dposkachei@gmail.com')->cc('bar@example.com');
        });
        */
        return back();
    }


}
