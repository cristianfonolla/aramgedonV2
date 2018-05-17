<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Mail;

class FrontController extends Controller
{
    public function index()
    {
    	return view('front.index');
    }

    public function contactForm(Request $request)
    {
    	$name = $request->input('name');
    	$email = $request->input('email');
    	$message = $request->input('message');
  
        Mail::to(['mail@mail.com'])->send(new ContactFormMail($name,$email,$message));
    	return redirect()->action('Front\FrontController@index');
    }
}
