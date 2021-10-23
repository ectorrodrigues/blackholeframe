<?php

 function email($email, $content, $subject){

   require 'vendors/PHPMailer_5.2.0/PHPMailerAutoload.php';

   $mail = new PHPMailer;

   //$mail->SMTPDebug = 3;                             // Enable verbose debug output
   $mail->isSMTP();                                    // Set mailer to use SMTP
   $mail->Host = 'mail.site.com';                    // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                             // Enable SMTP authentication
   $mail->Username = 'email@site.com';             // SMTP username
   $mail->Password = 'password';                // SMTP password
   $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 465;                                  // TCP port to connect to
   $mail->CharSet = 'UTF-8';

   $mail->setFrom('email@site.com', 'Site');
   $mail->addAddress($email, 'Site');
   $mail->addReplyTo('email@site.com');
   $mail->isHTML(true);                                  // Set email format to HTML

   $mail->Subject = 'Subject';
   $mail->Body    = $content;

   if(!$mail->send()) {
      echo 'Message Fail';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      header("Location:/");
  }

}

email($email, $content, $subject);


?>
