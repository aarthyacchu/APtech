<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $name = $_POST['name'];  // Ensure the form input field has 'name' attribute set
    $email = $_POST['email']; // Ensure the form input field has 'email' attribute set
    $message = $_POST['message']; // Ensure the form input field has 'message' attribute set

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use Gmail's SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'aarthyacchu595@gmail.com'; // Your Gmail address
        $mail->Password = 'zmgb fwom nyto bixn'; // App Password for Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress('aarthyacchu595@gmail.com'); // Recipient's email address

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();
        echo "Thank you for contacting us. Your message has been sent.";
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
