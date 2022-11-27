<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'not_regex:/^\s+|[<>#$%{}]|\s{2,}/'],
            'body' => ['required', 'not_regex:/^\s+|[<>#$%{}]|\s{2,}/']
        ]);
        
        $dataEmail = [
            'subject' => $request['subject'],
            'email' => $request['email'],
            'name' => $request['name'],
            'body' => $request['body'],
        ];
        Mail::to('afanhanan10@gmail.com')->send(new SendEmail($dataEmail));
        return redirect()->back()->with('success', 'Berhasil');
    }
}
