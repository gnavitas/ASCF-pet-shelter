<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require './function/PHPMailer/src/PHPMailer.php';
require './function/PHPMailer/src/SMTP.php';
require './function/PHPMailer/src/Exception.php';

// Initialize PHPMailer
$mail = new PHPMailer();

// Set up SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Google's SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'YOUR_EMAIL@gmail.com'; // Your Gmail or Google Workspace email address
$mail->Password = 'YOUR_APP_PASSWORD'; // Your Gmail or Google Workspace password
$mail->Port = 587; // Port for TLS encryption

// Enable TLS encryption
$mail->SMTPSecure = 'tls';

// Set email parameters
$mail->setFrom('YOUR_EMAIL@gmail.com', 'Your Name'); // Sender's email and name

// Get recipient email from the form
// Set recipient email directly
$recipient_email = 'YOUR_EMAIL@gmail.com';

// Add recipient email
$mail->addAddress($recipient_email); // Recipient's email

$mail->Subject = 'Subject of the Email'; // Email subject

// Email body
$mail->Body = "
    Dear adoptee,\n\n
    I hope this email finds you well. We wanted to inform you that your recent payment has been successfully processed using GCash. Below are the details of your transaction along with the steps you followed:\n\n
    Open GCash: Launch the GCash app on your phone.\n
    Click \"Send\": Tap on the \"Send\" option from the main menu.\n
    Send to 09398707328: Enter the recipient's mobile number as 09398707328.\n
    Enter Amount: Input the amount you want to send.\n
    Input Reference Number: In the message textbox, type your reference number.\n
    Click \"Next\": Tap on \"Next\" to proceed.\n
    Click \"Send\": Confirm the details and click \"Send\" to complete the transaction.\n\n
    Transaction Details:\n\n
    Recipient's Mobile Number: 09398707328\n
    Amount Need to send: 500\n
    Reference Number: $payment_reference_no\n\n
    Thank you for your prompt payment and continued support for the Animal Shelter and Care Facility. Your contributions play a vital role in our mission to provide care and support for animals in need.\n\n
    If you have any questions or require further assistance, please don't hesitate to contact us at [Your Contact Information].\n\n
    Warm regards,\n\n
    ASCF, Admin\n
    Animal Shelter and Care Facility\n
    093128732187
";


// Send the email
if (!$mail->send()) {
    echo 'Unable to send email. Error: ' . $mail->ErrorInfo;
    // Log the error or handle it appropriately
} else {
    echo 'Email sent successfully!';
    // You can redirect the user or display a success message here
}
?>