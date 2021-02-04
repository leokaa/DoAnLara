<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactMailer;


class FrontendController extends Controller
{
    public function contact(){
        return view('frontend.page.contact');
    }

    public function sendMailContactForm(Request $request){
        $input = $request->all();
        Mail::to('linhduy8a5@gmail.com')
        ->send(new ContactMailer($input));
        
    }
}
