<?php



$doctorID=$_SESSION["doc_Id"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Meeting Time Range Adjustment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        h2 {
            margin-bottom: 20px;
           
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        .period {
            display: flex;
            margin-bottom: 25px;
        }
        input[type="time"] {
            margin-right: 10px;
        }
        .add-period-btn {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adjust Time Range</h1>
        <!-- Display the weekly schedule with time range adjustment options -->
        <form action="process_setTime.php" method="POST" id="scheduleForm">

            <div class="day-section">
                <h2>Monday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_monday_1">Start Time:</label>
                        <input type="time" id="start_time_monday_1" name="start_time_monday_1">
                        <label for="end_time_monday_1">End Time:</label>
                        <input type="time" id="end_time_monday_1" name="end_time_monday_1">

                    </div>


                     <div class="period">
                        <label for="start_time_monday_2">Start Time:</label>
                        <input type="time" id="start_time_monday_2" name="start_time_monday_2">
                        <label for="end_time_monday_2">End Time:</label>
                        <input type="time" id="end_time_monday_2" name="end_time_monday_2">
                        
                    </div>

                    <hr>

                    
                </div>

            <!-- Tuesday -->
            
                <h2>Tuesday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_tuesday_1">Start Time:</label>
                        <input type="time" id="start_time_tuesday_1" name="start_time_tuesday_1">
                        <label for="end_time_tuesday_1">End Time:</label>
                        <input type="time" id="end_time_tuesday_1" name="end_time_tuesday_1">

                    </div>


                    <div class="period">
                        <label for="start_time_tuesday_2">Start Time:</label>
                        <input type="time" id="start_time_tuesday_2" name="start_time_tuesday_2">
                        <label for="end_time_tuesday_2">End Time:</label>
                        <input type="time" id="end_time_tuesday_2" name="end_time_tuesday_2">

                    </div>

                      <hr>
                    
                </div>


                
                <h2>Wednesday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_wednesday_1">Start Time:</label>
                        <input type="time" id="start_time_wednesday_1" name="start_time_wednesday_1">
                        <label for="end_time_wednesday_1">End Time:</label>
                        <input type="time" id="end_time_wednesday_1" name="end_time_wednesday_1">

                    </div>


                     <div class="period">
                        <label for="start_time_wednesday_2">Start Time:</label>
                        <input type="time" id="start_time_wednesday_2" name="start_time_wednesday_2">
                        <label for="end_time_wednesday_2">End Time:</label>
                        <input type="time" id="end_time_wednesday_2" name="end_time_wednesday_2">

                    </div>

                      <hr>

                    
                </div>



                 
                <h2>Thursday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_thursday_1">Start Time:</label>
                        <input type="time" id="start_time_thursday_1" name="start_time_thursday_1">
                        <label for="end_time_thursday_1">End Time:</label>
                        <input type="time" id="end_time_thursday_1" name="end_time_thursday_1">

                    </div>


                     <div class="period">
                        <label for="start_time_thursday_2">Start Time:</label>
                        <input type="time" id="start_time_thursday_2" name="start_time_thursday_2">
                        <label for="end_time_thursday_2">End Time:</label>
                        <input type="time" id="end_time_thursday_2" name="end_time_thursday_2">

                    </div>

                      <hr>

                    
                </div>

                
                <h2>Friday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_friday_1">Start Time:</label>
                        <input type="time" id="start_time_friday_1" name="start_time_friday_1">
                        <label for="end_time_friday_1">End Time:</label>
                        <input type="time" id="end_time_friday_1" name="end_time_friday_1">

                    </div>


                     <div class="period">
                        <label for="start_time_friday_2">Start Time:</label>
                        <input type="time" id="start_time_friday_2" name="start_time_friday_2">
                        <label for="end_time_friday_2">End Time:</label>
                        <input type="time" id="end_time_friday_2" name="end_time_friday_2">

                    </div>

                      <hr>

                    
                </div>



                
                <h2>Saturday</h2>

                <div class="periods">

                    <div class="period">
                        <label for="start_time_saturday_1">Start Time:</label>
                        <input type="time" id="start_time_saturday_1" name="start_time_saturday_1">
                        <label for="end_time_saturday_1">End Time:</label>
                        <input type="time" id="end_time_saturday_1" name="end_time_saturday_1">

                    </div>


                     <div class="period">
                        <label for="start_time_saturday_2">Start Time:</label>
                        <input type="time" id="start_time_saturday_2" name="start_time_saturday_2">
                        <label for="end_time_saturday_2">End Time:</label>
                        <input type="time" id="end_time_saturday_2" name="end_time_saturday_2">

                    </div>

               
                    
                </div>
            
            <input type="hidden" name="docID" value='<?php echo $doctorID  ?>' >
            <input type="submit" name="setTime" value="Adjust Time Range">
        </form>
    </div>

    
</body>
</html>
