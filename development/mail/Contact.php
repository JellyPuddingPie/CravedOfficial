<?php

    error_log('myTest');
error_log( print_R($_POST,TRUE) );
// Check for empty fields
 if(empty($_POST['onderwerp'])  		||
   empty($_POST['bericht'])	 

error_log('Mail about to be send');

// Create the email and send the message
$to = 'info@ifikske.be'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body ="u heeft een nieuwe bericht gekregen van $name\n\n
              email:$email_address\n
              telefoon: $phone\n
              adress: $adress\n\n
              gewenste geholpen te worden op: $dag / $maand / $jaar\n
              in het filiaal te $filiaal\n\n
              bericht:\n $message";
                  
$headers = "From: $email_address\r\n";
$headers .= "MIME-Version: 1.0' \r\n";
$header .= "Content-type: text/html\r\n";
$header .= "charset=UTF-8\r\n";
mail($to,$email_subject,$email_body,$headers);
error_log('Mail send');
return true;
?>