<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusNotification extends Notification
{
    use Queueable;

    public $application;

    /**
     * Create a new notification instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
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
        $applicationInfo = $this->application;
        $sender = auth()->user();

        $url = '';
        $message = '';

        if ($applicationInfo->status == "approved" || $applicationInfo->status == "rejected") {
            $message = 'Your application to the job vacancy ' . $applicationInfo->job->title . ' has been ' . $applicationInfo->status . ' by ' . $sender->name . ' ' . $sender->last_name;
            $url = url('/my-applications');
        } else if ($applicationInfo->status == "cancelled") {
            $message = $sender->name . ' ' . $sender->last_name . ' has ' . $applicationInfo->status . ' his application to the job vacancy ' . $applicationInfo->job->title;
            $url = url('/my-published-jobs/' . $applicationInfo->job->slug);
        }

        return (new MailMessage)
            ->greeting('Hello!')
            ->line($message)
            ->action('Check your applications', url($url))
            ->line('Thank you for using our application!');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        $applicationInfo = $this->application;
        $sender = auth()->user();
        $url = '';
        $message = '';

        if ($applicationInfo->status == "approved" || $applicationInfo->status == "rejected") {
            $message = $applicationInfo->status . ' your application for the job vacancy ' . $applicationInfo->job->title;
            $url = '/my-applications';
        } else if ($applicationInfo->status == "cancelled") {
            $message = $applicationInfo->status . ' his application for the job vacancy ' . $applicationInfo->job->title;
            $url = '/my-published-jobs/' . $applicationInfo->job->slug;
        }

        return [
            'url' => $url,
            'sender' => $sender->name . ' ' . $sender->last_name,
            'message' => $message,
        ];
    }


    /**
     * Get the broadcastable representation of the notification.
     *
     * @return BroadcastMessage<mixed>
     */

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([]);
    }
}
