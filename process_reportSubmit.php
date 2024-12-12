<?php

require "dBConn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get session ID from POST request
    $sessionID = $_POST['sessionID'];

    // Define the upload directory
    $uploadDir = 'Reports/';
    $uploadFile = $uploadDir . basename($_FILES['reportFile']['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($uploadFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['reportFile']['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedTypes = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx");
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES['reportFile']['tmp_name'], $uploadFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES['reportFile']['name'])) . " has been uploaded.";

            // Prepare the SQL statement
            $submitDate = date('Y-m-d H:i:s');
            $sql = "INSERT INTO reportssave (report, session_id, submit_Date) VALUES ('$uploadFile', '$sessionID', '$submitDate')";

            // Insert the record into the database

            if ($connection->query($sql) === TRUE) {
              
                $sql_update = "UPDATE notifications SET is_read = 1 WHERE sessionID = $sessionID";
                if ($connection->query($sql_update) === TRUE) {
                  echo '<script type="text/javascript">';
                  echo 'alert("File uploaded successfully!");';
                  echo 'window.location.href = "notificationPage.php";';
                  echo '</script>';
                } else {
                   echo "Error updating notification: " . $connection->error;
                    } 

            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
