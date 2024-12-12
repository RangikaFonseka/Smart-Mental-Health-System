<?php

include "../subHeader.php";

include "../dBConn.php";

// Fetch doctor details from the database
$sql = "SELECT * FROM doctors";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Information</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      margin-top: 100px;
    }

    body {
      font-size: 135%;
    }

    .doctor-card {
      margin: 30px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: linear-gradient(to right, #efefbb, #d4d3dd);
    }

    .doctor-image {
      max-width: 150px;
      border-radius: 50%;
    }

    .doctor-details {
      display: flex;
      align-items: center;
    }

    .doctor-details > div {
      margin-left: 20px;
    }

    .doctor-name {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .doctor-biography {
      padding-top: 5px;
    }

    .doctor-specialty {
      font-size: 1.2rem;
      color: #555;
    }

    .contact-info {
      margin-top: 15px;
    }

    .doc_info {
      display: flex;
      flex-direction: row;
    }

    .tp {
      width: 10%;
    }

    .info {
      width: 90%;
    }

    .tp p {
      padding-right: 8px;
      font-weight: bold;
      padding: 3px;
    }

    .info p {
      padding: 3px;
    }

    .phTp,
    .phInfo {
      display: none;
    }

    hr {
      border: 1px solid #ddd;
      margin: 20px 0;
    }

    @media (max-width: 895px) {
      .doc_info {
        display: flex;
        flex-direction: column;
      }

      .phTp,
      .phInfo {
        display: block;
        font-weight: bold;
      }

      .tp {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Check if any results are returned
    if ($result->num_rows > 0) {
        // Loop through each doctor record
        while ($row = $result->fetch_assoc()) {
            $name = $row['doc_Name'];
            $age = $row['age'];
            $tele = $row['telephone'];
            $email = $row['doc_email'];
            $img = $row['doc_img'];
            $qualification = $row['qualification'];
            $spec = $row['spec'];
            $description = $row['description']; // Assuming description column exists

            // Render each doctor card dynamically
            echo "
            <div class='doctor-card'>
              <div class='doctor-details'>
                <img src='$img' alt='Doctor Image' class='doctor-image'>
                <div>
                  <div class='doctor-name'>$name</div>
                  <div class='doctor-specialty'>$spec</div>
                  <div class='contact-info'>
                    <p><strong>Contact:</strong> $tele</p>
                    <p><strong>Email:</strong> $email</p>
                  </div>
                </div>
              </div>
              <hr>
              <div class='doc_info'>
                <div class='tp'>
                  <p>Qualification:</p>
                  <p>Description:</p>
                </div>
                <div class='info'>
                  <p class='phTp'>Qualification:</p>
                  <p>$qualification</p>
                  <p class='phInfo'>Description:</p>
                  <p>$description</p>
                </div>
              </div>
            </div>";
        }
    } else {
        echo "<p>No doctors found in the database.</p>";
    }
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
