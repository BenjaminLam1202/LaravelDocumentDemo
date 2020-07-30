<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;

class ProcessUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $email = $this->email;
         // Mail::to('hilton@asia.cybridge.jp')->send(new SendMailable());
         Mail::send('mail.listenermail', array('from'=>$email['from'],'detai'=>$email['detai'], 'thanhk'=>$email['thanhk']), function($message){
            // $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Visitor Feedback!');
            $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Job!');
        });
        \Log::info($email); 
    }
}
