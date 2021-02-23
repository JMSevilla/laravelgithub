<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Mail\SendMessage;
use App\Message;

class ContactController extends Controller
{
  public function contact() {   
    // Just for frontend
    return view('pages.contact');
  }   
  public function sendMessage(Request $request){
 
        $form_data = $request->only(['name','email', 'message', 'phone', 'location']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'message'   => ['required','min:10'],
            'phone'   => ['required'],
            'location'   => ['required'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
        else {
            $date_de_salvat = Message::create($request->all()); 
            Mail::to(setting('site.email'))->send(new SendMessage($date_de_salvat));
            return ['success' => true, 'msg' => 'Than you for your message! We will contact you soon!'];
        }
              
    }
}
