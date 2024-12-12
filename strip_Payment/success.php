<?php
session_start();

include "../subHeader.php";

function paymentUpdate($connection, $appointment_id, $amount, $status) {
    $sql = "INSERT INTO payments (appointment_id, amount, status) VALUES (?, ?, ?)";
    
    $stmt = $connection->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ids", $appointment_id, $amount, $status);
        $stmt->execute(); // Execute the prepared statement
        $stmt->close(); // Close the statement
        return true; // Return true if successful
    } else {
        return false; // Return false if preparation fails
    }
}


function createAppointment($connection, $id, $doctor, $date) {
    $uniqueId = uniqid() . rand(1000, 9999);
    $inv_Link = $uniqueId;

    $sql = "INSERT INTO appointment_info (patient_Id, doctor_Id, inv_Link, status, apo_Date)
            VALUES (?, ?, ?, 'new', ?)";

    $stmt = $connection->prepare($sql);
    if ($stmt) {
      
        $stmt->bind_param("iiss", $id, $doctor, $inv_Link, $date);
        if ($stmt->execute()) {
            // Get the last inserted ID directly from the connection object
            $last_insert_id = $connection->insert_id;
            return $last_insert_id;
        } 

        else {
            return false;
        }

    } else {
        return false;
    }
}

?>

  
  <?php  


if($_SESSION['selected_Status']==false){

    require "../phpmailer/mailConfig.php";
    require '../dBConn.php';

    $date = $_SESSION['date'];
    $time_slots = $_SESSION['time_slots'];
    $patient_id = $_SESSION['patient_id'];
    $doc_id = $_SESSION['doc_id'];
    $combined_datetime = $_SESSION['combined_date'];

    

    $appointment_ID=createAppointment($connection, $patient_id, $doc_id, $combined_datetime);
    mailSent($connection, $patient_id);
    $amount=100.00;
    if(paymentUpdate($connection,$appointment_ID,$amount,"paid")){
        
        ?>

 <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            font-size: 150%;
        }
        .confirmation-container {
            margin-top: 100px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .appointment-details, .payment-success {
            margin-top: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
  </head>
  <body>

<div class="container confirmation-container">
    <div class="text-center">
        <h1 class="display-4">Appointment Confirmed</h1>
        <p class="lead">Your appointment has been successfully booked!</p>
    </div>

    <div class="payment-success">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Payment Successful!</h4>
            <p>Thank you for your payment. Your transaction has been completed successfully.</p>
            <hr>
            <p class="mb-0">A confirmation email has been sent to your registered email address.</p>
        </div>
    </div>

    <div class="text-center">
        <a href="../landPage.php" class="btn btn-primary btn-back">Back to Home</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>            
       
<?php



    }
    

    $_SESSION['selected_Status']=true;
    $_SESSION['IsConfirmed']=false;
}


else{


echo "You are upadted";



}


?>

