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

require 'vendor/autoload.php'; // This should be the path to your Composer autoload file

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lewiskathembe51@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'gwvrkkfqihgctzic'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient pick the setfrom to get the name from th contact
        $mail->setFrom($email, $name);
        $mail->addAddress('lewismwendwa321@gmail.com', 'Lewis Kathembe'); // Replace with recipient address

        // Content  
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body  = $email_body;

        // Send email
        $mail->send();
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
