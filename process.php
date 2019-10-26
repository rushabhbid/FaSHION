<?php
session_start();
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;

try {
    $account_sid = "AC698d9eb14f82e01e6c8710bc6de88d5b";
    $auth_token = "5df2d52569ed6c75d62c46f92b23ac97";
    $twilio_phone_number = "(202) 816-5236";

    $client = new Client($account_sid, $auth_token);
    $otp = rand(100000,999999);
    $messages="Your otp is ".$otp;
    $phone_number="+91".$_SESSION['phone'];
    $client->messages->create(
        $phone_number,
        array(
            "from" => $twilio_phone_number,
            "body" => $messages
        )
    );


    $_SESSION['otp']=$otp;
    header( "Location:otp.php" );
}

//catch exception
catch(Exception $e) {
    echo "<script>
            alert('Invalid phone number');
            window.location.href='add.php';
            </script>";
}



?>