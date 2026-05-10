<?php
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();
include "../includes/db_con.php";
include "../function/function.php";

$admin_id = $_SESSION['admin-id'];

if(isset($_POST['admin_id'])){
    $admin_id_to_activate = $_POST['admin_id'];

    // Your activation logic here
    // For example, update the admin status in the database

    // Then, send activation email
    $email = "example@example.com"; // Replace with the admin's email
    $str = "Activation email body"; // Replace with your email body
    sendActivationEmail($email, $str); // Call the function to send email

    echo "Admin activated successfully"; // Send back a response
}

function sendActivationEmail($email, $str){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'YOUR_EMAIL@gmail.com';
    $mail->Password = 'YOUR_APP_PASSWORD';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('YOUR_EMAIL@gmail.com', 'Pet Shelter');
    $mail->addAddress($email);
    $mail->addEmbeddedImage('../../function/email/images/admin/image-1.png', '@image');
    $mail->Subject = "ASCF: Admin Temporary Account";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();
}
?>
