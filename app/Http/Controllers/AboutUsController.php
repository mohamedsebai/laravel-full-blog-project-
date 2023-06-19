<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        $email =  env('MAIL_FROM_ADDRESS'); // from env file or confi/app.php
        $contactData = Contact::where('our_email', '=' ,$email)->first();
        return view('front.about-us', compact('contactData'));
    }
}
