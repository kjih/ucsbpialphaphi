<?php
    $errorCount = 0;

    if ($_POST["submit"]) {
            if (!$_POST['name']) {
                $error = 'Please enter your name';
                $errorCount++;
            }

            if (!$_POST['email']) {
                if ($errorCount) {
                    $error .= '<br />';
                }

                $error .= 'Please enter your email address';
                $errorCount++;
            }

            if ($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error .='<br />Please enter a valid email address';
            }

            if (!$_POST['message']) {
                if ($errorCount) {
                    $error .= '<br />';
                }

                $error .= 'Please enter a message';
                $errorCount++;
            }

            if (!$_POST['subject']) {
                    $subject = "Message from ucsbpialphaphi.com contact form";
            } else {
                    $subject = $_POST['subject'];
            }

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
