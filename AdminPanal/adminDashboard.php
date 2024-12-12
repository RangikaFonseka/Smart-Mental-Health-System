<?php

include "../dBConn.php"; // Include your database connection file

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$numberOfPatients = 0;
$total = 0;


// Get today's appointments
$sql_today = "SELECT * FROM appointment_info WHERE apo_Date = CURRENT_DATE";
$result_today = $connection->query($sql_today);

// Get this week's appointments
$sql_week = "SELECT * FROM appointment_info WHERE  apo_Date BETWEEN CURRENT_DATE AND (CURRENT_DATE + INTERVAL 7 DAY)";
$result_week = $connection->query($sql_week);
if ($result_week->num_rows > 0) {
    while ($row = $result_week->fetch_assoc()) {
        $numberOfPatients++;
    }
}

// Calculate total income
$sql = "SELECT appointment_info.*, payments.* 
        FROM appointment_info 
        INNER JOIN payments ON appointment_info.apo_Id = payments.appointment_id ";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $total += $row['amount'];
    }
}


// Get appointment counts by day of the week
$daysql = "SELECT DAYOFWEEK(apo_Date) AS day_of_week, COUNT(*) AS appointment_count 
            FROM appointment_info 
            WHERE apo_Date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY)
            GROUP BY DAYOFWEEK(apo_Date)";

$dayresults = $connection->query($daysql);

// Initialize an array to hold the appointment counts for each day of the week
$appointmentCounts = array_fill(1, 7, 0); // 1 for Sunday, 2 for Monday, ..., 7 for Saturday

// Check if the query was successful
if ($dayresults) {
    // Fetch the results
    while ($row = $dayresults->fetch_assoc()) {
        // $row['day_of_week'] will be between 1 (Sunday) and 7 (Saturday)
        $appointmentCounts[$row['day_of_week']] = $row['appointment_count'];
    }
}



// Get appointment counts by day of the week
$daysql = "SELECT DAYOFWEEK(apo_Date) AS day_of_week, COUNT(*) AS appointment_count 
            FROM appointment_info 
            WHERE apo_Date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY)
            GROUP BY DAYOFWEEK(apo_Date)";

$dayresults = $connection->query($daysql);

// Initialize an array to hold the appointment counts for each day of the week
$appointmentCounts = array_fill(1, 7, 0); // 1 for Sunday, 2 for Monday, ..., 7 for Saturday

// Check if the query was successful
if ($dayresults) {
    // Fetch the results
    while ($row = $dayresults->fetch_assoc()) {
        // $row['day_of_week'] will be between 1 (Sunday) and 7 (Saturday)
        $appointmentCounts[$row['day_of_week']] = $row['appointment_count'];
    }
}






// Get next week's appointment counts
$nextdaysql = "SELECT DAYOFWEEK(apo_Date) AS day_of_week, COUNT(*) AS appointment_count 
            FROM appointment_info 
            WHERE apo_Date BETWEEN CURRENT_DATE AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
            GROUP BY DAYOFWEEK(apo_Date)";

$nextdayresults = $connection->query($nextdaysql);

// Initialize an array to hold the appointment counts for the next week
$nextappointmentCounts = array_fill(1, 7, 0); // 1 for Sunday, 2 for Monday, ..., 7 for Saturday

// Check if the query was successful
if ($nextdayresults) {
    // Fetch the results
    while ($row = $nextdayresults->fetch_assoc()) {
        // $row['day_of_week'] will be between 1 (Sunday) and 7 (Saturday)
        $nextappointmentCounts[$row['day_of_week']] = $row['appointment_count'];
    }
}


//lastweek admit Patients
$weekPatient="SELECT COUNT(*) AS patient_count 
            FROM patient_info 
            WHERE create_Date BETWEEN CURRENT_DATE AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
$result_weekPatient = $connection->query($weekPatient);






// SQL query to count patients created in the last 7 days, grouped by the day of the week
$nextPatientSql = "SELECT DAYOFWEEK(create_Date) AS day_of_week, COUNT(*) AS patient_count 
                   FROM patient_info 
                   WHERE create_Date BETWEEN CURRENT_DATE AND DATE_ADD(CURDATE(), INTERVAL -7 DAY)
                   GROUP BY DAYOFWEEK(create_Date)";

$nextPatientResults = $connection->query($nextPatientSql);

// Initialize an array to hold the patient counts for the next week
$nextPatientCounts = array_fill(1, 7, 0); // 1 for Sunday, 2 for Monday, ..., 7 for Saturday

// Check if the query was successful
if ($nextPatientResults) {
    // Fetch the results
    while ($row = $nextPatientResults->fetch_assoc()) {
        // $row['day_of_week'] will be between 1 (Sunday) and 7 (Saturday)
        $nextPatientCounts[$row['day_of_week']] = $row['patient_count'];
    }
}






// SQL query to count Doctors created in the last 7 days, grouped by the day of the week
$nextdocSql = "SELECT DAYOFWEEK(create_Date) AS day_of_week, COUNT(*) AS doc_count 
                   FROM doctors 
                   WHERE create_Date BETWEEN CURRENT_DATE AND DATE_ADD(CURDATE(), INTERVAL -7 DAY)
                   GROUP BY DAYOFWEEK(create_Date)";

$nextdocResults = $connection->query($nextdocSql);

// Initialize an array to hold the patient counts for the next week
$nextdocCounts = array_fill(1, 7, 0); // 1 for Sunday, 2 for Monday, ..., 7 for Saturday

// Check if the query was successful
if ($nextdocResults) {
    // Fetch the results
    while ($row = $nextdocResults->fetch_assoc()) {
        // $row['day_of_week'] will be between 1 (Sunday) and 7 (Saturday)
        $nextdocCounts[$row['day_of_week']] = $row['doc_count'];
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
</head>
<body>
<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-primary">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Patients This Week</h5>
                        <p class="card-text"><?php echo $numberOfPatients; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-success">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Patients Today</h5>
                        <p class="card-text"><?php echo $result_today->num_rows; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-warning">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Income</h5>
                        <p class="card-text"><?php echo $total; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card statistics-card">
                <div class="card-body">
                    <div class="icon text-info">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Performance</h5>
                        <p class="card-text">85%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Number of Appointments last Week
                </div>
                <div class="card-body">
                    <canvas id="last_appo_Chart"></canvas>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Number of Appointments Next Week
                </div>
                <div class="card-body">
                    <canvas id="next_appo_Chart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Calendar Section -->
    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Last Week Registered Patients 
                </div>
                <div class="card-body">
                    <canvas id="patientChart"></canvas>
                </div>
            </div>
        </div>


          <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Last Week Registered Doctors 
                </div>
                <div class="card-body">
                    <canvas id="docChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<script>
// Pass the PHP array to JavaScript
var appointmentCounts = <?php echo json_encode(array_values($appointmentCounts)); ?>;

// Chart.js for displaying patient data for this week
var ctx = document.getElementById('last_appo_Chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], // Include all days of the week
        datasets: [{
            label: 'Appointment',
            data: appointmentCounts,
            borderColor: '#CB356B', // Line color
            borderWidth: 2, // Line width
            tension: 0.4, // Smoothness of the line
            fill: false // Do not fill the area under the line
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true, // Start y-axis at 0
                min: 0, // Minimum y-axis value
                max: Math.max(...appointmentCounts) + 5, // Maximum y-axis value based on data
                title: {
                    display: true,
                    text: 'Number of Appointment', // Y-axis label
                }
            }
        },
        responsive: true,
        plugins: {
            legend: {
                display: true, // Show the legend
            },
            tooltip: {
                enabled: true, // Enable tooltips
            }
        }
    }
});






//chart about  last seven days patients
// Pass the PHP array to JavaScript
var nextappointmentCounts = <?php echo json_encode(array_values($nextappointmentCounts)); ?>;

// Chart.js for displaying patient data for this week
var ctx = document.getElementById('next_appo_Chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], // Include all days of the week
        datasets: [{
            label: 'Appointment',
            data: nextappointmentCounts,
            borderColor: '#CB356B', // Line color
            borderWidth: 2, // Line width
            tension: 0.4, // Smoothness of the line
            fill: false // Do not fill the area under the line
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true, // Start y-axis at 0
                min: 0, // Minimum y-axis value
                max: Math.max(...nextappointmentCounts) + 5, // Maximum y-axis value based on data
                title: {
                    display: true,
                    text: 'Number of Appointment', // Y-axis label
                }
            }
        },
        responsive: true,
        plugins: {
            legend: {
                display: true, // Show the legend
            },
            tooltip: {
                enabled: true, // Enable tooltips
            }
        }
    }
});


















var nextPatientCounts = <?php echo json_encode(array_values($nextPatientCounts)); ?>;

// Chart.js for displaying patient data for next week
var ctx2 = document.getElementById('patientChart').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], // Include all days of the week
        datasets: [{
            label: 'Patients',
            data: nextPatientCounts,
            backgroundColor: '#CB356B', // Bar color
            borderColor: 'rgba(54, 162, 235, 1)', // Bar border color
            borderWidth: 1 // Bar border width
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true, // Start y-axis at 0
                min: 0, // Minimum y-axis value
                max: Math.max(...nextPatientCounts) + 5, // Maximum y-axis value based on data
                title: {
                    display: true,
                    text: 'Number of Patients', // Y-axis label
                }
            }
        },
        responsive: true,
        plugins: {
            legend: {
                display: true, // Show the legend
            },
            tooltip: {
                enabled: true, // Enable tooltips
            }
        }
    }
});



var nextdocCounts = <?php echo json_encode(array_values($nextdocCounts)); ?>;

// Chart.js for displaying patient data for next week
var ctx2 = document.getElementById('docChart').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], // Include all days of the week
        datasets: [{
            label: 'Doctors',
            data: nextdocCounts,
            backgroundColor: '#CB356B', // Bar color
            borderColor: 'rgba(54, 162, 235, 1)', // Bar border color
            borderWidth: 1 // Bar border width
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true, // Start y-axis at 0
                min: 0, // Minimum y-axis value
                max: Math.max(...nextdocCounts) + 5, // Maximum y-axis value based on data
                title: {
                    display: true,
                    text: 'Number of Doctors', // Y-axis label
                }
            }
        },
        responsive: true,
        plugins: {
            legend: {
                display: true, // Show the legend
            },
            tooltip: {
                enabled: true, // Enable tooltips
            }
        }
    }
});




</script>
</body>
</html>


