<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;



class NewFollowerNotification extends Notification
{
    use Queueable;
    protected $follower;

    /**
     * Create a new notification instance.
     *
     * @return void
     *
     *
     * use it to send data
     */
    public function __construct(User $follwer)
    {
        //
        $this->follower = $follwer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     *
     *
     *
     *
     * retrun  array with channle 5 channles 1- mail 2- database 3- broadcast (pusher) 4-nexmo sms message 5- slack
     */
    public function via($notifiable) //notifiable mobel object will send notifications
    {
        return [
          // 'nexmo',
            //'mail',
            'database',
            'broadcast',

            // 'slack',
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */




    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('New Follower')
    //         ->from('Following@instagram.com', config('app.name'))
    //         ->greeting('Hi  ' . $notifiable->profile->full_name)
    //         ->line(sprintf('%s has followed you   ', $this->follower->profile->full_name . '"@' . $this->follower->username . '"')) // فقرة
    //         ->action('View  profile', url(route('profile.index', $this->follower->username))) // لوين
    //         ->line('Thank you for using our application!');
    //     // ->view('')//
    // }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Follower',
            'body' => sprintf('%s has followed you   ', $this->follower->profile->full_name),
            'action' => url(route('profile.index', $this->follower->username)),
            'image' => $this->follower->profile->avatar_url,
        ];
    }

    // public function toNexmo($notifiable)
    // {
    //     return (new NexmoMessage)->content(sprintf('%s has followed you   ', $this->follower->profile->full_name));
    // }




    public function toBroadcast($notifiable)
    {
        return [
            'title' => 'New Follower',
            'body' => sprintf('%s has followed you   ', $this->follower->profile->full_name),
            'action' => url(route('profile.index', $this->follower->username)),
            'user' => $this->follower,
        ];
    }

    // public function toSlack($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }



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
