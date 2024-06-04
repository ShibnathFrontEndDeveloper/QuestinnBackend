<?php

namespace App\Traits;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

trait Mailsend {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function sendMail($email,$otp) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        try { 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'websolveinfo.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'questinn@websolveinfo.com';   //  sender username
            $mail->Password = 'bsDu3Hq4pNaw';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
 
            $mail->setFrom('questinn@websolveinfo.com', 'Questinn');
            $mail->addAddress($email);
            //$mail->addCC($request->emailCc);
            //$mail->addBCC($request->emailBcc);
 
           // $mail->addReplyTo('sender@example.com', 'SenderReplyName');
 
            // if(isset($_FILES['emailAttachments'])) {
            //     for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
            //         $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            //     }
            // }
  
            $mail->isHTML(true);                // Set email content format to HTML 
            $mail->Subject = 'Forget Password';
            $mail->Body  = 'Your recover password otp is'.$otp; 
            // $mail->AltBody = plain text version of email body; 
            if( !$mail->send() ) {
                $results = 0;                
                // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }            
            else {
                $results = 1;
                // return back()->with("success", "Email has been sent.");
            } 
            return $results;
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }

    }

}