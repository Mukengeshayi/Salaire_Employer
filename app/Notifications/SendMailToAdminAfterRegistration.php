<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendMailToAdminAfterRegistration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $code;
    public $email;
    public function __construct($sendTocode, $sendToemail)
    {
        $this->code = $sendTocode;
        $this->email = $sendToemail;

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
     * Get the mail representation of the notification.s
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Creation du compte Administrateur')
                    ->line('Hello ')
                    ->line('Votre compte été crée avec succes ')
                    ->line('Saisissez le code'.$this->code.'renseignez le dans le formulaire qui apparaitra' )
                    ->line('cliquer ci-sessous pour confirmer votre compte ')
                    ->action('Cliquer', url('/validate-account'.'/'.$this->email))
                    ->line('Merci!');
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
