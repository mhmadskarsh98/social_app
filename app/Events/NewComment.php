<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $comment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        //
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */


    public function broadcastOn()
    {
        return new PrivateChannel('PostActivity.' . $this->comment->post->user_id);
    }

    public function broadcastAs()
    {
        return 'NewComment';
    }

    public function broadcastWith()
    {
        return [
            'comment' => $this->comment,
            'user' =>  $this->comment->user->load('profile'),

        ];
    }

    public function via()
    {
        return [
            'broadcast',
        ];
    }
    public function toBroadcast($notifiable)
    {
        return [
            'title' => 'New Comment',
            'body' => sprintf('%s has commente for you   ', $this->comment->user->username),
            'user' => $this->comment->post->user_id,
        ];
    }
}
