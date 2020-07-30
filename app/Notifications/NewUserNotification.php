<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use Mail;

class NewUserNotification extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function sendMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the day la dau.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
        return Mail::send('mail.sendform', array('name'=>$notifiable['name'],'email'=>$notifiable['email'], 'content'=>"this is the new guy ".$notifiable['name']), function($message){
            $message->to('hilton@asia.cybridge.jp', 'Admin')->subject('Visitor Feedback!');
        });
    }    
    public function toDatabase($notifiable)
    {
            return [
                'name' =>$notifiable['name'],
                'email' =>$notifiable['email'],
                    ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

}
