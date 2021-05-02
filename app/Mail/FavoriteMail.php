<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Board;
use App\User;

class FavoriteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Board $board, User $user)
    {
        $this->content = $board->content;
        $this->user = $user->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@tubuyaki.com')
                    ->view('mail.favorite')
                    ->with([
                        'content' => $this->content,
                        'name' => $this->name,
                    ]);
    }
}
