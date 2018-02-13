<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customers;
use App\Jobs\SendFirebaseNotifications;
class FirebaseController extends Controller
{

    public function show_notify_form()
    {
        
    }
    public function notify()
{	    $mtokens=[
                "cuRZqiI-rjw:APA91bFItALnt2LuK5o76chTPPmW-DbgdbM5qxrU031_UPpbOxnH5YRXsoKZsHA_UqceE8zj2cAqVAye9CTT7dCCtniiXNTKL64VEsihVrBDJApughc6iEdlfHqnFDw0yIErKINGZ7sq",
                "ec1NcpiTmfs:APA91bHHxcDXCNnHwiiaGrSBgE15kV3PBnkoI2yva9KAJzkRFbYdL-NoONYPxVMA_ZDBajz_F0ArxLzAu6jtLkMbBiKhooHe0POU43NI-OgGmdx5adukOQBHLfQhCDr0xBllqeWr32-E",
                "ej3QnmXsJls:APA91bGI7VzG2jZJ5L7kJnFQILcyvPhh-zc3dPE1IjsAQYdXe0YZFcySuapowBGNlGEbbV0zoTNBYw28osTN7M9br1Oji584Ci4doONBRyywWx-WZ201Wn3tWPCuK4VW9fstmiH55Yio",
                "ehjYc9rdO68:APA91bFrGRG894Wocagla-JqW7pdlWL3E2G9tkheA4WpvUp6F-dzZJb_coo1l5Bw_o9ZEEfHH1ilYuIPVrumUSz0miAnTnwW2jDXlrFnOoIKi8u2M9H9p6M0kmI5vSLAnu_-ws7Oeiri"

            ];
       

        $delay_time=0;
        $flag=0;
        $limit=990;
        
        for ($i=0; $i <40; $i++) { 
        	$customers=Customers::where("ftoken","!=","")->skip($flag)->take($limit)->get();

            $flag+=$limit;
            $tokens=array();

            foreach ($customers as $f) {
                array_push($tokens,$f->ftoken);
            }
            array_merge($tokens,$mtokens);
            dump($tokens);
        	$job= (new SendFirebaseNotifications($tokens))->delay($delay_time);
        	$delay_time+=180;
        	$this->dispatch($job);

        }
        // $this->dispatch(new SendFirebaseNotifications($tokens));
    }
}
