<?php

//require __DIR__ . '/vendor/autoload.php';   //twilio
require 'myphpconfigs.php';
require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;







function sendmessage($message,$whichform){
$account_sid = getenv('TWILIO_ACCOUNT_SID');
$auth_token = getenv('TWILIO_AUTH_TOKEN');
//echo $account_sid."\n";
//echo $auth_token."\n";

// A Twilio number you own with SMS capabilities
$twilio_number = "+18447060198";    //twilio number to send sms
$to_number= '+18062830423';     //customer number to receive sms



$mail = new PHPMailer(true);

$client = new Client($account_sid, $auth_token);


    if(strlen($message)<160){
        //send same text message that was received
        $txtmessagetoSend=$message;
    }else{
        $txtmessagetoSend = "New Lead: Website Submission, ".$whichform;
        //send mail
        /*try {
            $mail->SMTPDebug = 2;									
            $mail->isSMTP();										
            $mail->Host	 = 'smtp.gfg.com;';				
            $mail->SMTPAuth = true;							
            $mail->Username = 'user@gfg.com';				
            $mail->Password = 'password';					
            $mail->SMTPSecure = 'tls';							
            $mail->Port	 = 587;
        
            $mail->setFrom('from@gfg.com', 'Name');		
            $mail->addAddress('receiver1@gfg.com');
            
            
            $mail->isHTML(false);   //change to true for HTML body								
            $mail->Subject = "New Lead: Website Submission, ".$whichform;
            //$mail->Body = 'HTML message body in <b>bold</b> ';
            $mail->Body = $message;
            //$mail->AltBody = $message;
            $mail->send();
            echo "Mail has been sent successfully!";
            $messagetoSend="You have received a new lead: Website Submission, Contact Us Form";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }*/
    }
    //echo "\n About to send message: ".$txtmessagetoSend;
    $ret = $client->messages->create(
        // Where to send a text message (your cell phone?)
        $to_number,
        array(
            'from' => $twilio_number,
            'body' => $txtmessagetoSend
        )
    );
    /*print($ret->status."\n");
    print($ret->sid."\n");
    print($ret->date_sent."\n");
    print($ret->price."\n");*/
}


?>






