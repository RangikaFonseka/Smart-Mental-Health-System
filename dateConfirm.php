<?php 


include "subHeader.php";
require "dBConn.php";

if (isset($_POST['selected_time_slot'])) {
    $date = $_POST['date'];
    $time_slots = $_POST['selected_time_slot'];
    $patient_id = $_POST['patient_ID'];
    $doc_id = $_POST['doc_ID'];
    $doc_Name = $_POST['doc_Name'];
    


    
    $datetime_str = $date . ' ' . $time_slots; 
    $datetime = date_create_from_format('Y-m-d H:i', $datetime_str); 



   
    $combined_datetime = $datetime->format('Y-m-d H:i:s'); 


}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-size: 150%;


            background-image: url(img/land.jpg); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {


            max-width: 600px;


            margin: 100px auto;
            
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="date"],
        input[type="time"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }


        @media screen and (max-width: 650px) {
                .container {
                margin: 100px 20px;
                            }
          }

    </style>
</head>
<body>
    <div class="container">
        <h2>Select Date and Time for Appointment</h2>
        <form id="appointmentForm" action="strip_Payment/paymentConfig.php" method="POST">
            <label for="date">Date: <?php echo $date ?></label>
            <input type="hidden" id="date" name="date" value="<?php echo $date ?>"><br>

            <label for="time">Time: <?php echo $time_slots ?></label>
            <input type="hidden" id="time" name="selected_time" value="<?php echo $time_slots ?>"><br>

            <label for="name">Doctor Name: Dr.<?php echo $doc_Name ?></label>
            

            <input type="hidden" id="patientName" name="patientID" value="<?php echo $patient_id ?>">
            <br>

            <input type="hidden" id="patientName" name="doctorID" value="<?php echo $doc_id  ?>">
            <input type="hidden" id="patientName" name="combined_date" value="<?php echo $combined_datetime  ?>">

              

            <input type="submit" name="paymentConfirm" value="Confirm Appointment">
        </form>
    </div>
</body>
</html>
     
    
    
 






