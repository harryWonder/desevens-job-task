<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeToDesevens extends Notification
{
    use Queueable;
    public $Payload;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Payload)
    {
        $this->Payload = $Payload;
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
                    ->greeting('Welcome To Desevens')
                    ->line('Congratulations on creating a Desevens Account ' . $this->Payload->name . '.')
                    ->line('We are delighted to have you join us. However, we need one more thing from. Please, Kindly Activate Your Account By Using The Link Below.')
                    ->action('Notification Action', url($this->Payload->url))
                    ->line('If this process was not initiated by you. please contact us at info@desevensdigital.com');
    }
}
