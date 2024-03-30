<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
if(!empty($_GET['mail'])){
    $email=$_GET['mail'];
    $link="<a href='localhost/ecom1/password_reset.php?key=".$email."'>Click To Reset Password</a>";
    require_once('vendor/autoload.php');
    $mail = new PHPMailer(true);                  
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'zerobuoy74@gmail.com';                     
    $mail->Password   = 'pvevgzsqbwwfpgud';  
    $mail->SMTPSecure = 'tls';                             
    $mail->Port       = 25;     
    $mail->SMPTOptions=array('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false, 'allow_self_signed'=>true));                             
    $mail->setFrom('zerobuoy74@gmail.com', 'Rollomon Password Reset');
    $mail->addAddress($email, 'User');
    $mail->isHTML(true);                                  
    $mail->Subject = 'RESET PASSWORD';
    $mail->Body    = $link;
    $mail->AltBody = 'You Can use the Above link to reset your password';
    $mail->send();
    echo "<script>alert('A Link is sent to your Mail Account Please proceed through that link to Reset your Password');</script>";
}

?>