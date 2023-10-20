<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewNotification extends Notification
{
    use Queueable;

    public $interview;

    /**
     * Create a new notification instance.
     */
    public function __construct($interview)
    {
        $this->interview = $interview;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $interviewInfo = $this->interview;
        $sender = auth()->user();
        $url = url('/my-applications');

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('You have been invited to an interview for the job vacancy ' . $interviewInfo->applicant->job->title . ' by ' . $sender->name . ' ' . $sender->last_name)
            ->line('See all the interview information by clicking the "Interview information" button')
            ->action('Check your applications', url($url))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
