<?php
$name = $_POST['name'];
$visitor_email = $_POST['mail'];
$message = $_POST['message'];
$email_from = 'mateusznazur182@gmail.com';

$email_subject = "New form submisiiobn";
$email_body = "user Name: $name.\n". "User Message: $message.\n";

$to = "mateuszmazur182@gmail.com";
$headers = "From $email_from \r\n";
mail($to,$email_subject,$email_body,$headers);
header("Location: contact.php");

?>

