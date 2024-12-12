<?php
require "dBConn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['patient_id'];
} else {
    echo "No data received";
    exit;
}

$sql = "SELECT session_info.*, patient_info.*, doctors.* FROM session_info 
        INNER JOIN patient_info ON session_info.pa_Id = patient_info.p_Id 
        INNER JOIN doctors ON session_info.do_Id = doctors.doc_Id 
        WHERE session_info.pa_Id = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $data);
$stmt->execute();
$result_data = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Notes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .attachments a {
            color: #007bff;
            transition: color 0.3s;
        }
        .attachments a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($result_data && $result_data->num_rows > 0): ?>
        <?php while ($row_data = $result_data->fetch_assoc()): ?>
            <div class="card">
                <div class="card-header">
                    <h5>Appointment No: <?php echo htmlspecialchars($row_data['appo_Id']); ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Time:</strong> <?php echo htmlspecialchars($row_data['createTime']);?></p>
                    <p class="card-text"><strong>Doctor Name: Dr. </strong> <?php echo htmlspecialchars($row_data['doc_Name']);?></p> 
                   
                    <p class="card-text"><strong>Specialization:</strong> <?php echo htmlspecialchars($row_data['spec']); ?></p>
                    <h5><strong>Doctor's Recomandation:</strong></h5>
                    <p class="card-text"><strong>Medical History Info:</strong> <?php echo nl2br(htmlspecialchars($row_data['session_info'])); ?></p>

                     <p class="card-text"><strong>Current Medical Info:</strong> <?php echo nl2br(htmlspecialchars($row_data['c_info'])); ?></p>

                    <div class="attachments">
                        
                        <strong>Attachments:</strong>
                        <ul>
                            <?php
                            $sessionID = $row_data['session_Id'];
                            $attachmentSql = "SELECT report FROM reportssave WHERE session_id = ?";
                            $attachmentStmt = $connection->prepare($attachmentSql);
                            $attachmentStmt->bind_param("s", $sessionID);
                            $attachmentStmt->execute();
                            $attachmentResult = $attachmentStmt->get_result();
                            if ($attachmentResult->num_rows > 0):
                                while ($attachmentRow = $attachmentResult->fetch_assoc()): ?>
                                    <li><a href="<?php echo htmlspecialchars($attachmentRow['report']); ?>" target="_blank">Download Attachment</a></li>
                                <?php endwhile;
                            else: ?>
                                <li>No attachments available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">No records found.</div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
