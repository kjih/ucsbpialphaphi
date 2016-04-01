<?php
/*
 * send.php
 *
 * Performs verifications for contact form
 * and sends email to ucsbpaphiwebmaster@gmail.com.
 */

    $errorCount = 0;

    if ($_POST["submit"]) {
        // Verify that name field is not empty
        if (!$_POST['name']) {
            $error = 'Please enter your name';
            $errorCount++;
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
        }
        // Verify that message field is not empty
        if (!$_POST['message']) {
            if ($errorCount) {
                $error .= '<br />';
            }

            $error .= 'Please enter a message';
            $errorCount++;
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
            if (mail("ucsbpaphiwebmaster@gmail.com", $subject,
                    "Name: " . $_POST['name'] . "\n\nEmail: " . $_POST['email'] . "\n\nMessage: " . $_POST['message'])) {
                $_POST = array();
                $result = '<div class="resultDiv"><strong>Your message has been sent.</strong></div>';
            } else {
                $result = '<div class="resultDiv">Sorry, there was an error sending your message. Please try again.</strong></div>';
            }
        }
    }

?>
