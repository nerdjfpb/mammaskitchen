<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $contact = new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();

        Toastr::success('Your Message successfully send','Success',['position'=>'toast-top-right']);

        return redirect()->back();
    }
}
