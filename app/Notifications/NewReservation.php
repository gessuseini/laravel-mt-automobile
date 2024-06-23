<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReservation extends Notification
{
    use Queueable;

    public $reservationDate;
    public $reservationType;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservationDate, $reservationType)
    {
        $this->reservationDate = $reservationDate;
        $this->reservationType = $reservationType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $reservationTypeString = is_array($this->reservationType) ? implode(', ', $this->reservationType) : $this->reservationType;

        return (new MailMessage)
            ->subject('New Reservation')
            ->line('A new reservation has been made.')
            ->line('Reservation Date: ' . $this->reservationDate)
            ->line('Reservation Type: ' . $reservationTypeString)
            ->action('View Reservations', url('/appointments'))
            ->line('Thank you for using our service.');
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
