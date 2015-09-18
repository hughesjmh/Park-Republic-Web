<?php

header ('Access-Control-Allow-Origin: *');

//require_once('vendor/autoload.php');

error_reporting(E_ALL); ini_set('display_errors', 1);

require_once('../stripe/init.php');

//var_dump($_POST);

$totAmount = $_POST['payAmount'];
$d_email = $_POST['driverEmail'];

// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys


// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];


$euroAmount = $totAmount / 100;
$transAmt = number_format((float)$euroAmount, '2', '.', '');

$to = $d_email; // Send email to our user
$subject = 'Payment Confirmation'; // Give the email a subject 
$message = "
 
Thanks for using Park Republic. Your card has successfully charged an amount of €".$transAmt.". 
Park again soon :)
 
"; // Our message above including the link
                     
$headers = 'From: info@parkrepublic.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

// Create the charge on Stripe's servers - this will charge the user's card
\Stripe\Stripe::setApiKey("");

try {
$charge = \Stripe\Charge::create(array(
  "amount" => $totAmount, // amount in cents, again
  "currency" => "eur",
  "source" => $token,
  "description" => "Example charge")
);
} catch(\Stripe\Error\Card $e) {
  echo "The card has been declined.";
}

echo "1";

//header ('Location: menu_page.html');

?>