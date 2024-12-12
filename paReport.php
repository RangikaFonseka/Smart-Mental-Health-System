<?php
session_start();
include "dBConn.php";
include "subHeader.php";

$patient_id = $_SESSION['patient_id'];

$sql = "SELECT session_info.*, patient_info.* 
        FROM session_info 
        INNER JOIN patient_info ON session_info.pa_Id = patient_info.p_Id 
        WHERE pa_Id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital System - Doctor's Notes</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 150%;
    }
    .container {
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px;
        animation: fadeIn 1s ease-in-out;
    }
    h1, h3 {
        text-align: center;
        animation: fadeIn 1.5s ease-in-out;
    }
    .notes {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        animation: fadeIn 1s ease-in-out;
        min-height: 75vh;
        position: relative;
    }
    .doctor-notes {
        width: 100%;
    }
  
    .doctor-notes label {
        font-weight: bold;
    }
    .doctor-notes p {
        margin: 10px 0;
    }
    .attachments {
        margin-top: 20px;
    }
    .attachments label {
        font-weight: bold;
    }
    .attachments ul {
        list-style-type: none;
        padding: 0;
    }
    .attachments li {
        margin-bottom: 5px;
    }
    .button-container {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }
    .button-container button {
        padding: 10px 20px;
    }
    @media (max-width: 800px) {
        .container {
           padding: 0 10px;
           margin-top: 40px;
        }
        .notes {
            padding: 15px;
            min-height: 45vh;
        }
        .button-container {
            bottom: 10px;
            right: 10px;
        }
    }
</style>
</head>
<body>
<div class="container">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row_data = $result->fetch_assoc()): 
            $currentSessionID = $row_data['session_Id'];
            $reportSql = "SELECT report FROM reportssave WHERE session_id = ?";
            $reportStmt = $connection->prepare($reportSql);
            $reportStmt->bind_param("s", $currentSessionID);
            $reportStmt->execute();
            $reportResult = $reportStmt->get_result();
            $imgPath = "";
            if ($reportResult->num_rows > 0) {
                $reportRow = $reportResult->fetch_assoc();
                $imgPath = $reportRow['report'];
            }


                $doctor_Id=$row_data['do_Id'];
                $doc_query_data = "SELECT * FROM doctors WHERE doc_Id = '$doctor_Id';";
                $doc_result_data = mysqli_query($connection, $doc_query_data);
                $doc_Name = "";

                if (mysqli_num_rows($doc_result_data) > 0) {
                    while ($doc_result_data_row = mysqli_fetch_array($doc_result_data)) {
                        $doc_Name = $doc_result_data_row["doc_Name"];
                    }
                }






            ?>
            <div class="notes">
                <div class="doctor-notes">
                    <h3>Appointment No: <?php echo htmlspecialchars($row_data['appo_Id']); ?></h3>
                    <hr>
                    <label for="doctor-name">Date & Time:</label>
                    <p id="doctor-name"><?php echo htmlspecialchars($row_data['createTime']); ?></p>

                    <label for="doctor-name">Doctor's Name:</label>
                    <p id="doctor-name">Dr. <?php echo htmlspecialchars($doc_Name); ?></p><br>

                    <label for="doctor-name">Doctor's Recomandation:</label><br><br>
                    <label for="notes">Medical History Info:</label>
                    <p id="notes"><?php echo htmlspecialchars($row_data['session_info']); ?></p>

                    <label for="notes">Current Medical Info:</label>
                    <p id="notes"><?php echo htmlspecialchars($row_data['c_info']); ?></p><br>
                </div>
                <div class="attachments">
                    <label for="attachments">Attachments:</label>
                    <ul id="attachments">
                        <?php if ($imgPath): ?>
                            <li><a href="<?php echo htmlspecialchars($imgPath); ?>">Download Attachment</a></li>
                        <?php else: ?>
                            <li>No attachments available.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="button-container">
                  <form action="pdfCreate/downloadReport.php" method="post">
                    <input type="hidden" name="pa_Id" value="<?php echo htmlspecialchars($row_data['pa_Id']); ?>">
                    <input type="hidden" name="do_Id" value="<?php echo htmlspecialchars($row_data['do_Id']); ?>">
                    <input type="hidden" name="session_Id" value="<?php echo htmlspecialchars($row_data['session_Id']); ?>">
                    <input type="hidden" name="appo_Id" value="<?php echo htmlspecialchars($row_data['appo_Id']); ?>">
                    <button type="submit" name="pdfInfo" class="btn btn-primary">Download</button>
                  </form>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</div>
</body>
</html>
