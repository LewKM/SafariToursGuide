<?php
$year = $_POST["year"];
$month = $_POST["month"];
$destination = $_POST["destination"];
$days = $_POST["days"];
$adults = $_POST["adults"];
$children = $_POST["children"];
$rooms = $_POST["rooms"];
$budget = $_POST["budget"];
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$email_body = "Hello, I am $name, this is my email $email. I am interested in a $days day safari to $destination in $month $year. I will be traveling with $adults adults and $children children. I would like $rooms rooms. My budget is $budget. $message";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
// $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; //  SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'lewiskathembe51@gmail.com'; // email
$mail->Password = 'gwvrkkfqihgctzic'; // password
$mail->setFrom($email, $name);
$mail->addAddress('lewismwendwa321@gmail.com', 'Lewis Kathembe'); // Replace with recipient address
$mail->isHTML(true);
$mail->Subject = $_POST['subject'];
$mail->Body  = $email_body;

$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo 'alert("Mailer Error: " . $mail->ErrorInfo)';
}else{
    echo  '<script type ="text/JavaScript">';  
    echo 'alert("Message Sent Successfully!");';
    echo 'document.getElementById("contactForm").reset();'; // Reset the form with id "contact-form"
    echo '</script>';
}
?>