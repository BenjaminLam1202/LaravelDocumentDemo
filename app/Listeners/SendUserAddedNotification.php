<?php

namespace App\Listeners;

use App\Events\UserAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendUserAddedNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserAdded  $event
     * @return void
     */
    public function handle(UserAdded $event)
    {
         Mail::send('mail.listenermail', array('from'=>"me",'detai'=>"i heard that new user have been added", 'thanhk'=>"thank for using our service"), function($message){
            // $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Visitor Feedback!');
            $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Listening!');
        });
        Session::flash('flash_message', 'Send message listener successfully!');
    }    
    public function failed(UserAdded $event, $exception)
    {
        // dd($event,"hello failed");
    }
}
