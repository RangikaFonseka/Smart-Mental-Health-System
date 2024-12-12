<?php
include "../dBConn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['apo_ID'])){

    $apoID=$_POST['apo_ID'];


     
    $sql = "SELECT * FROM payments WHERE appointment_id LIKE ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $apoID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Payment ID</th><th>Appointment ID</th><th>Amount</th><th>Status</th></thead><tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['payment_id'] . '</td>';
            echo '<td>' . $row['appointment_id'] . '</td>';
            echo '<td>' . $row['amount'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    } else {
        echo 'No appointments found.';
    }

    $stmt->close();
   } 

    


else {

    echo "No data received";
    exit;

}

}




?>
