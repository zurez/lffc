<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customers;
use App\Jobs\SendFirebaseNotifications;
class FirebaseController extends Controller
{
    public function notify()
{	        $tokens=[
                "cuRZqiI-rjw:APA91bFItALnt2LuK5o76chTPPmW-DbgdbM5qxrU031_UPpbOxnH5YRXsoKZsHA_UqceE8zj2cAqVAye9CTT7dCCtniiXNTKL64VEsihVrBDJApughc6iEdlfHqnFDw0yIErKINGZ7sq",
                "e5mrjEIpnzM:APA91bFLKe4-ibTErh-S4u-IJuIwAG35yK7pIrKpvyHE3pdfFbt1MmN6L7yMKfNzymIM8wYWX0sO-JFrWdS75yf3ViogsAiyt1_0fjh43JQjFeBvT5nfSVaTdg2Oan99qHpFh8PsMa3t"

            ];
        $delay_time=0;
        for ($i=0; $i <4; $i++) { 
        	dump($delay_time);
        	$job= (new SendFirebaseNotifications($tokens))->delay($delay_time);
        	$delay_time+=10;
        	$this->dispatch($job);

        }
        // $this->dispatch(new SendFirebaseNotifications($tokens));
    }
}
