<?php

 function email($email, $content, $subject){

   require 'vendors/PHPMailer_5.2.0/PHPMailerAutoload.php';

   $mail = new PHPMailer;

   //$mail->SMTPDebug = 3;                             // Enable verbose debug output
   $mail->isSMTP();                                    // Set mailer to use SMTP
   $mail->Host = 'mail.postarstudio.com';                    // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                             // Enable SMTP authentication
   $mail->Username = 'contato@postarstudio.com';             // SMTP username
   $mail->Password = '#F39673beac';                // SMTP password
   $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 465;                                  // TCP port to connect to
   $mail->CharSet = 'UTF-8';

   $mail->setFrom('contato@postarstudio.com', 'Postar');
   $mail->addAddress($email, 'Postar');
   $mail->addReplyTo('contato@postarstudio.com');
   $mail->isHTML(true);                                  // Set email format to HTML

   $mail->Subject = 'Postar - Sua Conta';
   $mail->Body    = $content;

   if(!$mail->send()) {
      echo 'Message Fail';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      header("Location:https://postarstudio.com/retorno");
  }

}

//TESTING ----------------------
/*
$email = 'contato.padex@gmail.com';
$content = '
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Email Postar</title>
  </head>
  <body style="width:100%; text-align:center; background-color:#ddd; font-family:Arial, sans serif; color:#333;" align="center">
    <div style="width:100%; text-align:center; margin:30px 0; color:#ddd;">.</div>
    <div style="width:auto; text-align:center; margin:30px; border-radius:12px; background-color:#fff; padding:80px; margin:40px 100px;" align="center">

      <div class="text-align:text-center;">
        <img src="https://postarstudio.com/app/webroot/files/postar_logo.jpg" alt="Postar-logo" style="width:150px;">
      </div>
      <p><br></p>

      <div class="text-align:text-center; margin-top:90px;">
        <p>
          <h1 class="">Sua conta está ativada!</h1>
        </p>
        <p>
          <span style="">Seu login é:</span><br>
          <h2 style="margin-top:-10px; color:#000;">EMAIL</h2>
        </p>
        <p>
          <span style="">Sua senha é:</span><br>
          <h2 style="margin-top:-10px; color:#000;">SENHA</h2>
        </p>
        <p>
          <br>
          <a href="https://postarstudio.com/admin" style="color:#E2067C !important; text-decoration:none !important; font-size:20px; font-weight:bold;">> Acesse já clicando aqui.</a>
        </p>


        <p>
          <br><br>
          <span style="font-size:13px; color:#888;">Este é um email seguro de ativação de conta, enviado pela Postar.</span><br>
          <a href="https://postarstudio.com" style="color:#333 !important; text-decoration:none !important; font-size:13px; font-weight:bold;">postarstudio.com</a>
        </p>

      </div>

    </div>
    <div style="width:100%; text-align:center; margin:30px 0; color:#ddd;">.</div>
  </body>
</html>

';

$subject = 'Teste Cadastro';
*/
// END TESTING

email($email, $content, $subject);

// echo '<br>feito<br>';

?>
