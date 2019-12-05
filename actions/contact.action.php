<?php

    require('config.action.php');

    $to = 'contact@assurancediapers.com';
    $subject = 'Website Message from '.$_POST['contactName'].' in '.$_POST['contactState'];
    $senderEmail = $_POST['contactEmail'];

    $message = '
    <html>
    <head>
    <title>{$subject}</title>
    </head>
    <body>
    <p>'.$_POST['contactBody'].'</p>
    </body>
    </html>
    ';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

    // More headers
    $headers .= "From: <".$_POST['contactEmail']."> \r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";

    echo mail($to,$subject,$message,$headers) ? 'Message delivered<br/>We will get back to you shortly' : 'Error<br />Please try again';
?>