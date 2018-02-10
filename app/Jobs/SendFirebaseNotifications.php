<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Customers;
use Log;
class SendFirebaseNotifications extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tokens;
    public function __construct($tokens)
    {
        $this->tokens=$tokens;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->process($this->tokens);
    }


    public function  process($tokens)
    {   
        $title="Take a look at what new hacks and daily tips Crumblyy has for you.";
        $data=[
            "image"=>
                "https://s3-us-west-2.amazonaws.com/newlifehacks/noti02_10_2018.jpg",
            "message"=>
                "Frustrated with stuck zipper? Try this hack.",
            "AnotherActivity"=>
                "True",
            "title"=>
                'Hack of the day',
            "onlyUpdate"=>
                "false"
        ];

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder
                            
                            ->setSound('default')
                            ->setBody("https://s3-us-west-2.amazonaws.com/newlifehacks/noti_5feb.png");
                            ;

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // You must change it to get your tokens
        // $tokens = MYDATABASE=>=>pluck('fcm_token')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, null, $data);
        dump($downstreamResponse);
        $success=$downstreamResponse->numberSuccess();
        $dt=$downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        // Log::info("ERRORS. ".$topicResponse->error());
        //return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();
     
        //return Array (key => oldToken, value => new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

        //return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key=>token, value=>errror) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();
        $report=array();
        $report["success"]=$success;
        $report["failed"]=$dt;
        Log::info("***************************");
        Log::info("REPORT",$report);
        Log::info("***************************");

    }
}
