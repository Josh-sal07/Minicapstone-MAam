<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewBookingNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];  // You can add other channels like 'database', 'slack', etc.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Repair Booking')
                    ->line('You have received a new booking for a repair.')
                    ->line('Device: ' . $this->booking->device)
                    ->line('Issue: ' . $this->booking->issue)
                    ->line('Please log in to the system to view and accept the booking.')
                    ->action('View Booking', url('/bookings/' . $this->booking->id));
    }

    public function toArray($notifiable)
    {
        return [
            'device' => $this->booking->device,
            'issue' => $this->booking->issue,
            'status' => $this->booking->status,
        ];
    }
}

