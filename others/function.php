<?php

// include "../dBConn.php";

function writeDetails($appoID, $docID, $patientID, $details, $details_2) {
    global $connection;

    // Prepare an SQL statement for execution
    $stmt = $connection->prepare("INSERT INTO session_info (pa_Id, do_Id, appo_Id, session_info, c_info) VALUES (?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("iiiss", $patientID, $docID, $appoID, $details, $details_2);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    if( (!empty($reports))||(!empty($otherReport)) ){

         $req=1;   
         sendNotify($patient_id,$reports,$otherReport,"",$req,$is_read);

    }

     sendNotify($patient_id,$reports,$otherReport,"Update the patient Book",$req,$is_read);

}

function sendNotify($patient_id, $reports, $otherReport,$others,$report_req,$is_read) {
    global $connection;
    

    
    $reports_string = implode(",", $reports);

    // Prepare an SQL statement for execution
    $stmt_notify = $connection->prepare("INSERT INTO notifications (patient_id, message, otherMsg,others,report_req, is_read) VALUES (?,?,?,?,?,?)");
    if ($stmt_notify === false) {
        die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
    }

    // Bind the parameters to the SQL query
    $stmt_notify->bind_param("isssii", $patient_id, $reports_string, $otherReport,$others,$report_req, $is_read);

    // Execute the statement
    if ($stmt_notify->execute()) {
        echo "Notification sent successfully";
    } else {
        echo "Error: " . $stmt_notify->error;
    }

    // Close the statement
    $stmt_notify->close();
}

?>
