<?php

namespace App\Http\Controllers;

use App\Mail\Contactmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail ;

class ContactController extends Controller
{
   public function contact(){
return view('contact');
   }
   public function sendEmail(Request $request){
       $details=[
           'name'=>$request->name,
         'email'=>$request->email,
         'subject'=>$request->subject,
      'message'=>$request->message,
       ];
       Mail::to('nouhailaMraikh@gmail.com')->send(new Contactmail($details));
return back()->with('message_sent','your message has been sent successfully');

}


}
