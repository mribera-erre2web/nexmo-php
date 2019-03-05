<?php

require_once __DIR__ . '/../vendor/autoload.php';

use NexmoPhp\Client\Credentials;
use NexmoPhp\Client\Client;
use NexmoPhp\Client\Messages;

$credentials = new Credentials("APIKey", "APISecret");

$client = new Client($credentials);

$message = new Messages(); // Create single message

/*CHANNEL OF DESTINATION*/
$message->sms(); //set message type sms
//$message->whatsapp(); //set message type whatsapp
//$message->viber(); //set message type viber
//$message->messenger(); //set message type messenger

/*BODY OF THE MESSAGE*/
$message->message("text", "heye"); //set message

/*FROM AND DESTINATION (ID FOR MESSENGER)*/
$message->setFrom("NUMBER"); //set from number
$message->setTo("NUMBER"); //set to number

/*DELIVER*/
var_dump($client->messages($message)); //set endpoint messages and send
