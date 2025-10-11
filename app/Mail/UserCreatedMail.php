<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $generatedPassword;

    public function __construct(User $user, $generatedPassword)
    {
        $this->user = $user;
        $this->generatedPassword = $generatedPassword;
    }

    public function build()
    {
        return $this->subject('Your Account Has Been Created')
                    ->view('emails.user_created');
    }
}
