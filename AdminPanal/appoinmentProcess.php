<?php
include "../dBConn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['pa_ID'])){

        $patient_ID = $_POST['pa_ID'];

        // SQL query to join appointment_info with doctors and patients to get their names
        $sql = "
        SELECT 
            a.apo_Id, 
            p.p_Name, 
            d.doc_Name, 
            a.apo_Date
        FROM 
            appointment_info a
        JOIN 
            patient_info p ON a.patient_Id = p.p_Id
        JOIN 
            doctors d ON a.doctor_Id = d.doc_Id
        WHERE 
            a.patient_Id LIKE ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $patient_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Appointment ID</th><th>Patient Name</th><th>Doctor Name</th><th>Appointment Date</th></thead><tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['apo_Id'] . '</td>';
                echo '<td>' . $row['p_Name'] . '</td>';
                echo '<td>' . $row['doc_Name'] . '</td>';
                echo '<td>' . $row['apo_Date'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo 'No appointments found.';
        }

        $stmt->close();
    }

} else {
    echo "No data received";
    exit;
}
?>
