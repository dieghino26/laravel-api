<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function message(Request $request)
    {
        $data = $request->all();
        $mail = new ContactMessageMail($data['sender'], $data['subject'], $data['content']);
        Mail::to(env('MAIL_TO_ADDRESS'))->send($mail);
        return response(null, 200);
    }
}
