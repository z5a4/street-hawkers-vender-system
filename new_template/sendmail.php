<?php 

$to_email = "navedmalek047@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by Naved Malek";
$headers = "From: navedmalek03@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>