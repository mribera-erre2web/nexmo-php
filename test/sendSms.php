<?php
namespace NexmoPhp\Client;

$credentials = new Credentials("APIKey", "APISecret");

$client = new Client($credentials);

$message = new Messages();

$message->sms(); //set message type sms/whatsapp/viber/messenger
$message->message("text", "heye"); //set message
$message->setFrom("NUMBER"); //set from number
$message->setTo("NUMBER"); //set to number

$client->messages(); //set endpoint messages and send
//$client->dispatch(); //set endpoin dispatch and send
