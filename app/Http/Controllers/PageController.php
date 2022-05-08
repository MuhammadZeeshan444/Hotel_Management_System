<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //about us
    function about_us()
    {
        return view('about_us');
    }
    //contact us
    function contact_us()
    {
        return view('contact_us');
    }
    //save contact us form
    function save_contactus(Request $request)
    {
         //
         $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'msg' => 'required',
        ]);
       $data = array(
           'name' => $request->full_name,
           'email' => $request->email,
           'subject' => $request->subject,
           'msg' => $request->msg,
       );
    Mail::send('mail', $data, function ($message) {
        $message->from('mughalzeeshan695@gmail.com', 'zeeshan');
        $message->to('mughalzeeshan695@gmail.com', 'zeeshan');
        $message->subject('Contact Us Query');
    });


        return redirect('page/contact_us')->with('success', 'Mail has been sent.');
    }
}
