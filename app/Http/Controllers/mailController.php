<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;

class mailController extends Controller
{
    public function send()
    {

    	Mail::send(new SendMail());



    	// Mail::send(['text' => 'lol'],['name','Milan'],function($message)
    	// 	{
    	// 		$message -> to('khimdingmilan100@gmail.com','Welcome') -> subject('Test Email');
    	// 		$message ->from('laravel@gmail.com','Laravel');	
    	// 	});
    }
}
