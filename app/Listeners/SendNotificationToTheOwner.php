<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner implements ShouldQueue
{
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
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //
          //
        $message=$event->message;
        //
        Mail::send('emails.contact',['msg'=>$message],function($m)use($message){
    $m->from($message->email,$message->nombre)
    ->to('marukosu16@hotmail.com','Marcos Vi')
    ->subject('Tu mensaje fue recibido');
});
    }
}
