<?php

$doctorID = $_SESSION["doc_Id"];
$seq = 0;

$sql = "SELECT appointment_info.*, payments.* 
        FROM appointment_info 
        INNER JOIN payments ON appointment_info.apo_Id = payments.appointment_id 
        WHERE doctor_Id = '$doctorID'";

$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-primary">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div>
                        <h5 class="card-title">This Week Payment</h5>
                        <p class="card-text">45</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-success">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Today Payment</h5>
                        <p class="card-text">5</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-warning">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Income</h5>
                        <p class="card-text">$1,200</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-info">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Performance</h5>
                        <p class="card-text">85%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Appointment ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){ 
                    $seq++;
            ?>
            <tr>
                <th scope="row"><?php echo $seq; ?></th>
                <td><?php echo $row['appointment_id']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
