<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

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
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
        ->from('atumajoe24@gmail.com', 'Joseph Atuma')
        ->greeting("Hello!")
        ->subject($this->data['subject'])
        ->line($this->data['body'])
        ->markdown('mail.message.template', [
            'subject' => $this->data['subject'],
            'body'    => $this->data['body']
        ]);

        // Attach Files Properly
        // dd($data['attachments']);
        if (!empty($this->data['attachments'])) {
            foreach ($this->data['attachments'] as $filePath) {
                $mail->attach(public_path().'/storage/EmailFiles/'.$filePath);
            }
        }

        // Add CC and BCC
        if (!empty($this->data['cc'])) {
            $mail->cc($this->data['cc']);
        }
        if (!empty($this->data['bcc'])) {
            $mail->bcc($this->data['bcc']);
        }
        return $mail;
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
