<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicantNotification extends Notification
{
    use Queueable;

    public $job;

    /**
     * Create a new notification instance.
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $jobInfo = $this->job;
        $sender = Auth::user();

        $url = url('/my-published-jobs/' . $jobInfo->slug);

        return (new MailMessage())
            ->greeting('Hello!')
            ->line($sender->name . ' ' . $sender->last_name . ' has applied to your job vacancy ' . $jobInfo->title)
            ->action('Check your applicants', url($url))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {

        $notifiable->notification += 1;
        $notifiable->save();

        $sender = Auth::user();

        return [
            'url' => '/my-published-jobs/' . $this->job->slug,
            'sender' => $sender->name . ' ' . $sender->last_name,
            'senderTitle' => $sender->job_title,
            'message' => ' has applied to your job vacancy ' . $this->job->title,
        ];
    }
}
