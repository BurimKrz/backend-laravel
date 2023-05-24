<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BuyerInterestedProduct extends Notification
{
    use Queueable;
    public $user;
    public $product;
    public $Owner;
    /**
     * Create a new notification instance.
     */
    public function __construct($Owner, $user, $product)
    {
        $this->user    = $user;
        $this->product = $product;
        $this->Owner   = $Owner;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [

            'notifiable_id' => $notifiable->id,
            'Full Name'     => $this->user['name'] . ' ' . $this->user['surname'],
            'Product'       => $this->product['name'],
        ];
    }
}
