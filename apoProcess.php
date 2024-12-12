<?php
require "dBConn.php";
include 'subHeader.php';

if(isset($_POST["submit"])){

    $Name = $_POST["name"];
    $Nic = $_POST["nic"];
    $Doctor = $_POST["doctor"];
    $Date = $_POST["selectedDate"];

    // Prepare statements to prevent SQL injection
    $stmt = $connection->prepare("SELECT p_Id FROM patient_info WHERE p_Nic = ?");
    $stmt->bind_param("s", $Nic);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0){
        $row_data = $result->fetch_assoc();
        $patient_id = $row_data['p_Id'];
    }

    $stmt = $connection->prepare("SELECT doc_Id, doc_Name FROM doctors WHERE doc_Name = ?");
    $stmt->bind_param("s", $Doctor);
    $stmt->execute();
    $resultqry = $stmt->get_result();
    $stmt->close();

    if($resultqry->num_rows > 0){
        $row_dataqry = $resultqry->fetch_assoc();
        $doc_id = $row_dataqry['doc_Id'];
        $doc_name = $row_dataqry['doc_Name'];
    }

    $docID = $doc_id;

    $given_date = $Date;
    $day_of_week_numeric = date('w', strtotime($given_date));
    $day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $day_of_week_name = $day_names[$day_of_week_numeric];

    $stmt = $connection->prepare("SELECT * FROM set_time WHERE doc_ID = ?");
    $stmt->bind_param("i", $docID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0){
        $row_data = $result->fetch_assoc();

        switch ($day_of_week_name) {
            case "Monday":
                $dayStart_1 = $row_data["m_Start"];
                $dayEnd_1 = $row_data["m_End"];
                $dayStart_2 = $row_data["m2_Start"];
                $dayEnd_2 = $row_data["m2_End"];
                break;
            case "Tuesday":
                $dayStart_1 = $row_data["tu_Start"];
                $dayEnd_1 = $row_data["tu_End"];
                $dayStart_2 = $row_data["tu2_Start"];
                $dayEnd_2 = $row_data["tu2_End"];
                break;
            case "Wednesday":
                $dayStart_1 = $row_data["w_Start"];
                $dayEnd_1 = $row_data["w_End"];
                $dayStart_2 = $row_data["w2_Start"];
                $dayEnd_2 = $row_data["w2_End"];
                break;
            case "Thursday":
                $dayStart_1 = $row_data["th_Start"];
                $dayEnd_1 = $row_data["th_End"];
                $dayStart_2 = $row_data["th2_Start"];
                $dayEnd_2 = $row_data["th2_End"];
                break;
            case "Friday":
                $dayStart_1 = $row_data["f_Start"];
                $dayEnd_1 = $row_data["f_End"];
                $dayStart_2 = $row_data["f2_Start"];
                $dayEnd_2 = $row_data["f2_End"];
                break;
            case "Saturday":
                $dayStart_1 = $row_data["s_Start"];
                $dayEnd_1 = $row_data["s_End"];
                $dayStart_2 = $row_data["s2_Start"];
                $dayEnd_2 = $row_data["s2_End"];
                break;
        }
    }

    function generateTimeSlots($doc_ID, $connection, $start, $end, $start_two, $end_two, $interval = '30') {
        $start_time = strtotime($start);
        $end_time = strtotime($end);

        $start_time_two = strtotime($start_two);
        $end_time_two = strtotime($end_two);

        $interval_seconds = $interval * 60;
        $time_slots = array();
        $time_slots_two = array();

        $stmt = $connection->prepare("SELECT apo_Date FROM appointment_info WHERE doctor_Id = ?");
        $stmt->bind_param("i", $doc_ID);
        $stmt->execute();
        $result_Check = $stmt->get_result();
        $stmt->close();

        for ($current_time = $start_time; $current_time <= $end_time; $current_time += $interval_seconds) {
            $time_slots[] = date('H:i', $current_time);
        }

        for ($current_time_two = $start_time_two; $current_time_two <= $end_time_two; $current_time_two += $interval_seconds) {
            $time_slots_two[] = date('H:i', $current_time_two);
        }

        return [
            'timeSlotOne' => $time_slots,
            'timeSlotTwo' => $time_slots_two
        ];
    }

    $time_slots = generateTimeSlots($docID, $connection, $dayStart_1, $dayEnd_1, $dayStart_2, $dayEnd_2);

    $slotOne = $time_slots['timeSlotOne'];
    $slotTwo = $time_slots['timeSlotTwo'];

    $datesArray = array();

    $stmt = $connection->prepare("SELECT apo_Date FROM appointment_info WHERE doctor_Id = ?");
    $stmt->bind_param("i", $docID);
    $stmt->execute();
    $skip_result = $stmt->get_result();
    $stmt->close();

    if($skip_result->num_rows > 0){
        while($row_skip_data = $skip_result->fetch_assoc()){
            $date = date('Y-m-d', strtotime($row_skip_data['apo_Date']));

            if($date == $given_date){
                $time = date("H:i", strtotime($row_skip_data['apo_Date']));
                $datesArray[] = $time;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Time Slot</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(img/land.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: none;
            font-size: 150%;
        }
        .time-slot-btn {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 100%;
        }
        .card-text {
            text-transform: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h5 class="card-header"><?php echo "Selected Date: " . $given_date; ?></h5>
        <div class="card-body">
            <p class="card-text">Make a time for your appointment.</p>
            <form method="post" action="dateConfirm.php">
                <?php foreach ($slotOne as $time_slot): ?>
                    <?php if (!in_array($time_slot, $datesArray)): ?>
                        <?php $end_time_slot = date('H:i', strtotime($time_slot) + 30 * 60); ?>
                        <p> Session Time <?php echo $time_slot; ?> To <?php echo $end_time_slot; ?>
                            <button type="submit" class="time-slot-btn btn btn-primary" name="selected_time_slot" value="<?php echo $time_slot; ?>">Select</button>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php foreach ($slotTwo as $time_slot): ?>
                    <?php if (!in_array($time_slot, $datesArray)): ?>
                        <?php $end_time_slot = date('H:i', strtotime($time_slot) + 30 * 60); ?>
                        <p> Session Time <?php echo $time_slot; ?> To <?php echo $end_time_slot; ?>
                            <button type="submit" class="time-slot-btn btn btn-primary" name="selected_time_slot" value="<?php echo $time_slot; ?>">Select</button>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>

                <input type="hidden" name="doc_ID" value="<?php echo $doc_id; ?>">
                <input type="hidden" name="patient_ID" value="<?php echo $patient_id; ?>">
                <input type="hidden" name="date" value="<?php echo $given_date; ?>">
                <input type="hidden" name="doc_Name" value="<?php echo $doc_name; ?>">
            </form>
        </div>
    </div>
</div>
</body>
</html>
