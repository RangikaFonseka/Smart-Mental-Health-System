<?php
session_start();
include "subHeader.php";
include 'dBconn.php';

$id = $_SESSION["patient_id"];
$query_data = "SELECT * FROM appointment_info WHERE patient_Id = '$id';";
$result_data = mysqli_query($connection, $query_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
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
    <div class="container">
        <h1>My Appointments</h1>

        <?php if (mysqli_num_rows($result_data) > 0): ?>
            <?php while ($row_data = mysqli_fetch_array($result_data)): ?>
                <?php
                $doctor_Id = $row_data["doctor_Id"];
                $apo_Date = $row_data["apo_Date"];
                $apo_Id = $row_data["apo_Id"];
                $inv_Link = $row_data["inv_Link"];
                $link = "https://meet.jit.si/" . $inv_Link;

                $doc_query_data = "SELECT * FROM doctors WHERE doc_Id = '$doctor_Id';";
                $doc_result_data = mysqli_query($connection, $doc_query_data);
                $doc_Name = "";

                $appointmentDate = date('Y-m-d', strtotime($apo_Date));
                $appointmentTime = date('H:i:s', strtotime($apo_Date));

                if (mysqli_num_rows($doc_result_data) > 0) {
                    while ($doc_result_data_row = mysqli_fetch_array($doc_result_data)) {
                        $doc_Name = $doc_result_data_row["doc_Name"];
                    }
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h3>Appointment ID: <?php echo $apo_Id; ?></h3>
                    </div>
                    <div class="card-body">
                        
                        <p>Date: <?php echo $appointmentDate; ?></p>
                        <p>Time: <?php echo $appointmentTime; ?></p>
                        <p>Doctor: <?php echo $doc_Name; ?></p>
                        
                        <p><a href="<?php echo $link; ?>" class="btn btn-primary">Start</a></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</body>
</html>
