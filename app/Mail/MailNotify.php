<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
   /**
    * Create a new data instance.
    *
    * @return void
    */

   public function __construct($data)
   {
       $this->data = $data;
   }

   /**
    * Build the message.
    *
    * @return $this
    */
//    public function build()
//    {
//         if($this->data['check'] == 'changepassword'){
//             return $this->from('Phireus2002@gmail.com')
//             ->view('Auth.SendMail')
//             ->subject('[Cấp lại mật khẩu - SkylineAdimin]');
//         }
//         else if($this->data['check'] == 'confirmroom'){
//             return $this->from('Phireus2002@gmail.com')
//             ->view('emails.ggg')
//             ->subject('[Thư cảm ơn-Chi tiết đơn đặt phòng-Skyline]');
//         }
//    }
}
