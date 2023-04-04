<?php
  
  namespace App\Http\Controllers;
    
  use Illuminate\Http\Request;
  use Mail;
  use App\Mail\dservMail;
    
  class MailController extends Controller
  {
      /**
       * Write code on Method
       *
       * @return response()
       */
      public static function index($to,$data)
      {
          $mailData = [
              'title' => $data['title'],
              'first_name' => $data['first_name'],
              'last_name' => $data['last_name'],
              'email' => $data['email'],
              'birthday' => $data['birthday'],
              'gender' => $data['gender'],
          ];
           
          Mail::to($to)->send(new dservMail($mailData));
             
          return true;
      }
  }