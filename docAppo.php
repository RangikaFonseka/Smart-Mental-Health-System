<?php
session_start();
include "dBConn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dateRange = $_POST['dateRange'];

    // Set the date range based on the selected option
    if ($dateRange === 'custom') {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    } elseif ($dateRange === 'today') {
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+1 day'));
    } elseif ($dateRange === 'last30days') {
        $startDate = date('Y-m-d', strtotime('-30 days'));
        $endDate = date('Y-m-d');
    }

    $doctorID = $_SESSION["doc_Id"];

    // SQL query to fetch appointment and patient information
    $sql = "SELECT appointment_info.*, patient_info.p_Name, patient_info.p_Id 
            FROM appointment_info 
            INNER JOIN patient_info ON appointment_info.patient_Id = patient_info.p_Id 
            WHERE doctor_Id = '$doctorID' AND appointment_info.apo_Date BETWEEN '$startDate' AND '$endDate' 
            ORDER BY appointment_info.apo_Date";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $currentDate = "";
        // Loop through the results and display them
        while ($row = $result->fetch_assoc()) {
            $dateTime = new DateTime($row['apo_Date']);
            $date = $dateTime->format('Y-m-d');
            $time = $dateTime->format('H:i:s');

            if ($date != $currentDate) {
                if ($currentDate != "") {
                    echo "</div>"; // Close the previous date group
                }

                $currentDate = $date;
                echo "<div class='date-group'>";
                echo "<h3 class='date-header '>$date</h3>";
            }
            ?>
            <div class="rowData">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2 mb-2 mb-md-0">
                                <h5 class="card-title">Time: <?php echo $time; ?></h5>
                            </div>
                            <div class="col-12 col-md-3 mb-2 mb-md-0">
                                <h5 class="card-title">Name: <?php echo $row['p_Name']; ?></h5>
                            </div>
                            <div class="col-12 col-md-2 mb-2 mb-md-0">
                                <form class="paInfo">
                                    <input type="hidden" name="patient_id" class="patient_id" value="<?php echo $row['p_Id']; ?>">
                                    <button type="submit" name="submit_info" class="submit_info btn btn-sm btn-outline-secondary">Show details</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-2 mb-2 mb-md-0">
                                <form action='videoSessionConfig.php' method='post'>
                                    <input type='hidden' name='doc_id' value="<?php echo $doctorID; ?>">
                                    <input type='hidden' name='patient_id' value="<?php echo $row['p_Id']; ?>">
                                    <input type='hidden' name='appo_id' value="<?php echo $row['apo_Id']; ?>">
                                    <button type='submit' name='submit_data' class='btn btn-secondary'>Start Session</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-2 mb-2 mb-md-0">
                                <form id="detailsWriteForm">
                                    <input type='hidden' name='doc_id' class="doc_id" value="<?php echo $doctorID; ?>">
                                    <input type='hidden' name='patient_id' class="patient_id" value="<?php echo $row['p_Id']; ?>">
                                    <input type='hidden' name='appo_id' class="appo_id" value="<?php echo $row['apo_Id']; ?>">
                                    <button type='submit' name='submit' id="submit" class='btn btn-secondary'>Write Conclusion</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
        echo "</div>"; // Close the last date group
    } else {
        echo "<p>No new patients found.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        .hidden {
            display: none;
        }
        .back-button {
            display: none;
            width: 25%;
        }
    </style>
</head>
<body>
    <div class="rowResult hidden"></div>
    <div class="detailsWriteInfo hidden"></div>
    <center><button class="back-button btn btn-primary" onclick="goBack()">Back</button></center>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.submit_info', function(e) {
                e.preventDefault(); // Prevent the form from submitting the default way
                var patient_id = $(this).closest('form').find('.patient_id').val();
                $.ajax({
                    type: 'POST',
                    url: 'sample2.php',
                    data: { patient_id: patient_id },
                    success: function(response) {
                        $('.rowData').addClass('hidden');
                        $('.date-header').addClass('hidden');
                        $('.rowResult').removeClass('hidden').html(response);
                        $('.back-button').show();
                    },
                    error: function() {
                        alert('Error processing request');
                    }
                });
            });

            $(document).on('click', '#submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting the default way
                var patient_id = $(this).closest('form').find('.patient_id').val();
                var appo_id = $(this).closest('form').find('.appo_id').val();
                var doc_id = $(this).closest('form').find('.doc_id').val();
                $.ajax({
                    type: 'POST',
                    url: 'detailsWrite2.php',
                    data: { patient_id: patient_id, appo_id: appo_id, doc_id: doc_id },
                    success: function(response) {
                        $('.rowData').addClass('hidden');
                        $('.date-header').addClass('hidden');
                        $('.detailsWriteInfo').removeClass('hidden').html(response);
                        $('.back-button').show();
                    },
                    error: function() {
                        alert('Error processing request');
                    }
                });
            });
        });

        function goBack() {
            $('.rowData').removeClass('hidden');
            $('.rowResult').addClass('hidden');
            $('.detailsWriteInfo').addClass('hidden');
            $('.date-header').removeClass('hidden');
            $('.back-button').hide();
        }
    </script>
</body>
</html>
