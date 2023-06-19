<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesRequest;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {

        $email =  env('MAIL_FROM_ADDRESS'); // from env file
        $contactData = Contact::where('our_email', '=' ,$email)->first();
        return view('front.contact', compact('contactData'));



    }

    public function store(MessagesRequest $request)
    {

        if ($request->isMethod('post')) {

            $request->validated();
            $request->string('name')->trim();
            $request->string('email')->trim();

            $name    = filter_var(strip_tags($request->input('name')), FILTER_SANITIZE_STRING);
            $email   = strip_tags($request->input('email'), FILTER_VALIDATE_EMAIL);
            $subject = strip_tags($request->input('subject'), FILTER_SANITIZE_STRING);
            $message = strip_tags($request->input('message'), FILTER_SANITIZE_STRING);

            Message::create([
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
            ]);
            //$successMessage = __('Lang.insert Success message');
            return back()->with('message'," <div class='alert alert-success'>  ". __('Lang.Insert success message') . " </div>");
        }else{
            return back()->with('message'," <div class='alert alert-danger'>  ". __('Lang.Error with data') . " </div>");
        }
    }


}
