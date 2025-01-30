<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageApp extends Notification
{
    use Queueable;
    private $data = [];
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('atumajoe24@gmail.com', 'Joseph Atuma')
        ->greeting("Hello!")
        ->subject($this->data['subject'])
        ->line($this->data['body']);
         // Add CC if provided
    if (!empty($this->data['cc'])) {
        $mail->cc($this->data['cc']);
    }

    // Add BCC if provided
    if (!empty($this->data['bcc'])) {
        $mail->bcc($this->data['bcc']);
    }
       return $mail->markdown('mail.message.template', [
            'subject'           => $this->data['subject'],
            'body'              => $this->data['body']
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
            'subject' => $this->data['subject'],
            'body' => $this->data['body']
        ];
    }
}
