<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->greeting('Dear Candidate,')
            ->line('Thank you for expressing your interest for the position of “Teaching Support Associate” (TSA) at the Sindh Education Foundation.')
            ->action('Kindly visit our website www.sefteachforchange.com to fill out the online Application Form. Once completed, please download your Job Application Form from the “Application History” section, follow the instructions (mentioned in the Job Application section) and send us the signed hard copy at the address provided.', 'www.sefteachforchange.com')
            ->line('Please note that due to high volume of the applications only shortlisted candidates will be contacted for the next stage of the hiring process via email provided in the application form. Therefore, kindly check your e-mail inbox and spam folder regularly for further information.')
            ->action('Please also subscribe and follow our facebook page; www.facebook.com/tfc.sef for updates.', 'www.facebook.com/tfc.sef')
            ->line('We look forward to evaluating your application.')
            ->line('Thank you,')
            ->line('Recruitment Team');
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
        ];
    }
}
