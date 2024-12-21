<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SystemNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $data=[];

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
        return $this->data['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
        ->from('atumajoe24@gmail.com', 'Joseph Atuma')
        ->greeting("Hello!")
        ->subject($this->data['subject'])
        ->line($this->data['body'])
        ->markdown('components.admin.email-app', [
            'reciepients_email' => $this->data['reciepients_email'],
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
            // 'notification_id' => $this->data['notification_id'],
            // 'reciepients_email' => $this->data['reciepients_email'],
            'subject' => $this->data['subject'],
            'message' => $this->data['message']
        ];
    }
}