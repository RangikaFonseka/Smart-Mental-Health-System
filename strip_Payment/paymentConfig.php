<?php
session_start();
require_once("../dBConn.php");
//require_once("../activeLog.php");
//logActivity($connection,$_SESSION["userId"],"process Transaction");

//$selectTotal=$_SESSION["session_total"];


if (isset($_POST['paymentConfirm'])) {
    $date = $_POST['date'];
    $time_slots = $_POST['selected_time'];
    $patient_id = $_POST['patientID'];
    $doc_id = $_POST['doctorID'];
    $combined_date=$_POST['combined_date'];

    

  
if($_SESSION['IsConfirmed']){

$_SESSION['date'] = $date;
$_SESSION['time_slots'] = $time_slots;
$_SESSION['patient_id'] = $patient_id;
$_SESSION['doc_id'] = $doc_id;
$_SESSION['combined_date']=$combined_date;
$_SESSION['selected_Status']=false;



include "vendor/stripe/stripe-php/init.php";

$stripeSecretKey = 'sk_test_51PH5rAA7UCGqhPuemb9q0brczRNNqusRy8MX1KPlkj9x3leMlvYnniRBA9J83PQKoTqDPAsSKu8IZEn0jv57aCMK00LYRSKbG5';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/HMS_System/strip_Payment/';

$checkout_session = \Stripe\Checkout\Session::create([



'line_items' => [
  [
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'Doctor Consultation Fee', // Name of the charge (e.g., doctor consultation fee)
      ],
      'unit_amount' => 5000, // Amount in cents (e.g., $50.00)
    ],
    'quantity' => 1, // Quantity of this item (usually 1 for a consultation)
  ],
  [
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'Hospital Service Charge', // Name of the charge (e.g., hospital service charge)
      ],
      'unit_amount' => 10000, // Amount in cents (e.g., $100.00)
    ],
    'quantity' => 1, // Quantity of this item (usually 1 for a service charge)
  ],
],
'mode' => 'payment',

  'success_url' => $YOUR_DOMAIN . 'success.php',
  'cancel_url' => $YOUR_DOMAIN . 'unsuccess.php',
]);



header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);




  }


else{


  echo "Something went Wrong";
}

}


