
<?php

include "subHeader.php";

 if(isset($_POST['reportSubmit'])){ 

$sessionID = $_POST['sessionID'];

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Report Upload</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{

            font-size: 130%;

        }
        .container {
            margin-top: 100px;
        }
        .card {
            margin: 20px 0;
        }
        .form-header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="form-header">Upload Patient Report</h3>
            </div>
            <div class="card-body">
                <form action="process_reportSubmit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="reportFile">Upload Report</label>
                        <input type="hidden" name="sessionID" value="<?php echo $sessionID?>">
                        <input type="file" class="form-control-file" id="reportFile" name="reportFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Report</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
