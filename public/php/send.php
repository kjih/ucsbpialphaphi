<?php
/*
 * send.php
 *
 * Performs verifications for contact form
 * and sends email to ucsbpaphiwebmaster@gmail.com.
 */
    require 'PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $errorCount = 0;

    if ($_POST["submit"]) {
        // Verify that name field is not empty
        if (!$_POST['name']) {
            $error = 'Please enter your name';
            $errorCount++;
        } else {
            $name = $_POST['name'];
        }
        // Verify that email field is not empty
        if (!$_POST['email']) {
            if ($errorCount) {
                $error .= '<br />';
            }

            $error .= 'Please enter your email address';
            $errorCount++;
        }
        // Verify email format
        if ($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .='<br />Please enter a valid email address';
            $errorCount++;
        } else {
            $from = $_POST['email'];
        }
        // Verify that message field is not empty
        if (!$_POST['message']) {
            if ($errorCount) {
                $error .= '<br />';
            }

            $error .= 'Please enter a message';
            $errorCount++;
        } else {
            $message = $_POST['message'];
        }
        // Subject field optional
        // Check for entered subject, or use default
        if (!$_POST['subject']) {
                $subject = "Message from ucsbpialphaphi.com contact form";
        } else {
                $subject = $_POST['subject'];
        }

        // Display error or success message(s)
        if ($error) {
            $result = '<div class="resultDiv"><strong>' . $error . '</strong></div>';
        } else {
            $to = "ucsbpaphiwebmaster@gmail.com";
            // $message = "Name: " . $_POST['name'] . "\n\nEmail: " . $_POST['email'] . "\n\nMessage: " . $_POST['message'];
            // $headers = "From: " . $_POST['email'];
            $body = "Name: " . $name . "\n\nEmail: " . $from . "\n\nMessage: " . $message;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ucsbpaphisender@gmail.com';
            $mail->Password = 'lasttimelasttime';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($from, $from);          
            $mail->addReplyTo($from, $from);
            $mail->addAddress($to);

            $mail->Subject = $subject;
            $mail->Body = $body;

            if ($mail->send()) {
                $_POST = array();
                $result = '<div class="resultDiv"><strong>Your message has been sent.</strong></div>';
            } else {
                $result = '<div class="resultDiv">Sorry, there was an error sending your message. Please try again.</strong></div>';
            }

            // if (mail($to, $subject, $message, $headers)) {
            //     $_POST = array();
            //     $result = '<div class="resultDiv"><strong>Your message has been sent.</strong></div>';
            // } else {
            //     $result = '<div class="resultDiv">Sorry, there was an error sending your message. Please try again.</strong></div>';
            // }
        }
    }

?>
