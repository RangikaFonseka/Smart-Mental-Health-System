<?php

include "dBConn.php";

$docID = $_SESSION["doc_Id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fb;
            font-family: Arial, sans-serif;
        }
        .doc-pro-edit-container {
            max-width: 800px;
            margin: 50px auto;
        }
        .doc-pro-edit-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .doc-pro-edit-card-body {
            background: linear-gradient(135deg, #0066cc 0%, #00cc99 100%);
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .doc-pro-edit-card-text {
            margin-bottom: 15px;
            font-size: 16px;
        }
        .doc-pro-edit-card-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }
        .doc-pro-edit-profile-info {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }
        .icon {
            margin-right: 10px;
        }
        .btn-custom {
            background-color: #0066cc;
            color: white;
            border-radius: 20px;
            padding: 10px 10px;
            margin-top: 30px;
        }
        .btn-custom:hover {
            background-color: #004d99;
            color: #fff;
        }
        /* Image styling */
        .doc-pro-edit-profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0066cc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="doc-pro-edit-container">
        <h2 class="mb-4">Doctor Profile</h2>

        <?php
        $sql = "SELECT * FROM doctors WHERE doc_Id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $docID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $doctor = $result->fetch_assoc();
        ?>
            
            <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo str_replace('../', '', $doctor['doc_img']); ?>" alt="Doctor Image" class="doc-pro-edit-profile-pic">
            </div>

            <div class="doc-pro-edit-card">
                <div class="doc-pro-edit-card-body">
                    <h5 class="card-title"><i class="icon bi bi-person-circle"></i></h5>
                </div>
                <div class="doc-pro-edit-profile-info">
                    <p class="card-text"><i class="icon bi bi-envelope"></i><strong>Name:</strong> <?php echo $doctor['doc_Name']; ?></p>
                    <p class="card-text"><i class="icon bi bi-envelope"></i><strong>Email:</strong> <?php echo $doctor['doc_email']; ?></p>
                    <p class="doc-pro-edit-card-text"><i class="icon bi bi-telephone"></i><strong>Phone:</strong> <?php echo $doctor['telephone']; ?></p>
                    <p class="doc-pro-edit-card-text"><i class="icon bi bi-briefcase"></i><strong>Specialization:</strong> <?php echo $doctor['spec']; ?></p>
                    <a href="doc_pro_edit_other.php" class="btn btn-custom mt-3">Edit Profile</a>
                </div>
            </div>
        <?php
        } else {
            echo "<p>No doctor found.</p>";
        }

        $stmt->close();
        $connection->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
