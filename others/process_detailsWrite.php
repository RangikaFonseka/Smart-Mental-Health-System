<?php
session_start();
require_once "../dBConn.php";

// Default value for unread notifications
$is_read = 0;
$req = 0;

if (isset($_POST["details_submit"])) {
    $medicalCondition = $_POST["medicalCondition"];
    $currentMedication = $_POST["currentMedication"];
    $appo_id = $_POST["appo_id"];
    $patient_id = $_POST["pa_id"];
    $doc_id = $_POST["doc_id"];

    $reports = isset($_POST['reports']) ? $_POST['reports'] : [];
    $otherReport = isset($_POST['otherReport']) ? $_POST['otherReport'] : '';

    // Save details in the database and get the session ID
    $sID = writeDetails($appo_id, $doc_id, $patient_id, $medicalCondition, $currentMedication);

    // If there are reports or other reports, send a notification
    if (!empty($reports) || !empty($otherReport)) {
        $req = 1;
        sendNotify($patient_id, $sID, $reports, $otherReport, $req, $is_read);
    }

    // If everything is successful, show a success message and redirect
    echo "<script>
            alert('Details successfully submitted!');
            window.location.href = '../doc_interface.php'; // Redirect to update page
          </script>";
}

// Function to write details to the session_info table
function writeDetails($appoID, $docID, $patientID, $details, $details_2) {
    global $connection;

    $stmt = $connection->prepare("INSERT INTO session_info (pa_Id, do_Id, appo_Id, session_info, c_info) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
    }

    $stmt->bind_param("iiiss", $patientID, $docID, $appoID, $details, $details_2);

    if ($stmt->execute()) {
        $last_session_ID = $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    return $last_session_ID;
}

// Function to send notifications
function sendNotify($patient_id, $sessionId, $reports, $otherReport, $report_req, $is_read) {
    global $connection;

    $reports_string = implode(",", $reports);

    $stmt_notify = $connection->prepare("INSERT INTO notifications (patient_id, sessionID, message, otherMsg, report_req, is_read) VALUES (?,?,?,?,?,?)");
    if ($stmt_notify === false) {
        die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
    }

    $stmt_notify->bind_param("iissii", $patient_id, $sessionId, $reports_string, $otherReport, $report_req, $is_read);

    if ($stmt_notify->execute()) {
        echo "Notification sent successfully";
    } else {
        echo "Error: " . $stmt_notify->error;
    }

    $stmt_notify->close();
}
?>
