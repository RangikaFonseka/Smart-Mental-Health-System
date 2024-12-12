<?php

session_start();


require "dBConn.php";
$pa_ID=$_SESSION["patient_id"];
$_SESSION['IsConfirmed']=true;


include "subHeader.php";
include "dBConn.php";


    $book_query_data = "SELECT * FROM patient_info WHERE p_Id='$pa_ID'  ";

    $book_result_data = mysqli_query($connection,$book_query_data);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-image: url(img/land.jpg); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 125px;
        }


        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-transform: none;
        }
        .card-body .btn {
            background-color: #007bff;
            color: #fff;
        }
        .card-body .btn:hover {
            background-color: #0056b3;
        }


    </style>
</head>
<body>

    <?php

            if(mysqli_num_rows($book_result_data)>0){
                while($book_row_data = mysqli_fetch_array($book_result_data)){
                  
               $patient_Name=$book_row_data['p_Name'];
               $patient_Nic=$book_row_data['p_Nic'];
               $patient_Email=$book_row_data['p_Email'];
               $patient_Contact=$book_row_data['p_Contact'];

           }

       }
               

                 ?>



    <div class="container" style="font-size:150%;">

        <h1 class="mb-4">Book Appointment</h1>


<div class="card">


 <div class="card-header ">After selecting the doctor and date your forms will be directed to time</div>

  <div class="card-body">


    <form action="apoProcess.php" method="POST">
            <div class="form-group">
                
            <input type="hidden" class="form-control" id="name" name="name" value="<?php echo $patient_Name ?>" required>
            </div>

            <div class="form-group">
                
                <input type="hidden" class="form-control" id="nic" name="nic" value="<?php echo $patient_Nic ?>" required>
            </div>

            <div class="form-group">
                
                <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $patient_Email ?>" required>
            </div>

            <div class="form-group">
                
                <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $patient_Contact ?>" required>
            </div>

           <div class="form-group">

              <label for="doctor">Select Doctor</label>
             <select class="form-control" id="doctor" name="doctor" required>
             <option value="">Select Doctor</option>
        <?php
       
        $query = "SELECT doc_Name FROM doctors";
        $result = mysqli_query($connection, $query);

         
            if ($result && mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['doc_Name'] . '">Dr. ' . $row['doc_Name'] . '</option>';
               }
          } else {
              echo '<option value="">No doctors available</option>';
          }
        ?>
          </select>
         </div>



            <div class="form-group">
                <label for="date">Preferred Date</label>
                <input type="date" class="form-control" id="date" name="selectedDate" required>
                
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Book Appointment</button>


        </form>
  </div>
</div>

        

    </div>
  
</body>
</html>
