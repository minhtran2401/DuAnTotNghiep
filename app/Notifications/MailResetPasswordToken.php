<?php
 
namespace App\Notifications;
 
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
 
class MailResetPasswordToken extends Notification
{
    use Queueable;
 
    public $token;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }
 
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Khôi phục mật khẩu")
                    ->line("Bạn đã quên mật khẩu của mình? Nhấn vào 'Khôi Phục Mật Khẩu' để lấy lại mật khẩu nhé ! .")
                    ->action('Khôi Phục Mật Khẩu', url('password/reset', $this->token))
                    ->line('Cảm ơn bạn đã ủng hộ GreenFresh ♥');
    }
 
}