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
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $product)
    {
        $this->user    = $user;
        $this->product = $product;

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

            'Full Name' => $this->user['name'] . ' ' . $this->user['surname'],
            'Product'   => $this->product['name'],
        ];
    }
}
