<?php

session_start();


require "dBConn.php";


    if (isset($_POST['setTime'])) {

        $id= $_POST["docID"];


          // Proceed with the update
            
        $start_time_monday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_monday_1']));
        $start_time_monday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_monday_2']));

        $start_time_tuesday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_tuesday_1']));
        $start_time_tuesday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_tuesday_2']));

        $start_time_wednesday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_wednesday_1']));
        $start_time_wednesday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_wednesday_2']));

        $start_time_thursday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_thursday_1']));
        $start_time_thursday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_thursday_2']));

        $start_time_friday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_friday_1']));
        $start_time_friday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_friday_2']));

        $start_time_saturday_1 = date('Y-m-d H:i:s', strtotime($_POST['start_time_saturday_1']));
        $start_time_saturday_2 = date('Y-m-d H:i:s', strtotime($_POST['start_time_saturday_2']));

//end time

        $end_time_monday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_monday_1']));
        $end_time_monday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_monday_2']));

        $end_time_tuesday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_tuesday_1']));
        $end_time_tuesday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_tuesday_2']));

        $end_time_wednesday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_wednesday_1']));
        $end_time_wednesday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_wednesday_2']));

        $end_time_thursday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_thursday_1']));
        $end_time_thursday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_thursday_2']));

        $end_time_friday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_friday_1']));
        $end_time_friday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_friday_2']));

        $end_time_saturday_1 = date('Y-m-d H:i:s', strtotime($_POST['end_time_saturday_1']));
        $end_time_saturday_2 = date('Y-m-d H:i:s', strtotime($_POST['end_time_saturday_2']));



echo "$start_time_monday_1";
echo $id;

        $sql_last_update = "SELECT * FROM set_time WHERE doc_ID = '$id' "; 


        // check the  data is available or not

        $result_last_update = mysqli_query($connection,$sql_last_update);

        if(mysqli_num_rows($result_last_update)>0){





        $result_last_update = $connection->query($sql_last_update);
        $row_last_update = $result_last_update->fetch_assoc();

        $last_update_time = strtotime($row_last_update['lastUpade']);
        $current_time = time();
        $two_weeks = 2 * 7 * 24 * 60 * 60; // Two weeks in seconds

        if ($current_time - $last_update_time < $two_weeks) {
            echo "You can only update once every two weeks. Please try again later.";
        } else {
          

            
            $sql = "UPDATE set_time SET 
            m_Start = '$start_time_monday_1', 
            m_End = '$end_time_monday_1', 
            tu_Start = '$start_time_tuesday_1', 
            tu_End = '$end_time_tuesday_1', 
            w_Start = '$start_time_wednesday_1', 
            w_End = '$end_time_wednesday_1', 
            th_Start = '$start_time_thursday_1', 
            th_End = '$end_time_thursday_1', 
            f_Start = '$start_time_friday_1', 
            f_End = '$end_time_friday_1', 
            s_Start = '$start_time_saturday_1', 
            s_End = '$end_time_saturday_1', 
            m2_Start = '$start_time_monday_2', 
            m2_End = '$end_time_monday_2', 
            tu2_Start = '$start_time_tuesday_2', 
            tu2_End = '$end_time_tuesday_2', 
            w2_Start = '$start_time_wednesday_2', 
            w2_End = '$end_time_wednesday_2', 
            th2_Start = '$start_time_thursday_2', 
            th2_End = '$end_time_thursday_2', 
            f2_Start = '$start_time_friday_2', 
            f2_End = '$end_time_friday_2', 
            s2_Start = '$start_time_saturday_2', 
            s2_End = '$end_time_saturday_2', 
            lastUpade = '$current_time' 
            WHERE doc_ID = '$id'";

           
            if ($connection->query($sql) === TRUE) {
                echo "Data inserted successfully";

                
                $update_last_update = "UPDATE set_time  SET lastUpade = NOW() WHERE doc_ID = $id";
                $connection->query($update_last_update);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
}

else{
        $current_time = date('Y-m-d H:i:s');

         $sql = "INSERT INTO set_time (doc_ID, m_Start, m_End, tu_Start, tu_End, w_Start, w_End, th_Start, th_End, f_Start, f_End, s_Start, s_End, m2_Start,m2_End, tu2_Start, tu2_End, w2_Start, w2_End, th2_Start, th2_End, f2_Start, f2_End,s2_Start, s2_End) VALUES ('$id',     '$start_time_monday_1','$end_time_monday_1','$start_time_tuesday_1','$end_time_tuesday_1',' $start_time_wednesday_1','$end_time_wednesday_1','$start_time_thursday_1','$end_time_thursday_1','$start_time_friday_1','$end_time_friday_1','$start_time_saturday_1','$end_time_saturday_1', '$start_time_monday_2',' $end_time_monday_2','$start_time_tuesday_2','$end_time_tuesday_2','$start_time_wednesday_2','$end_time_wednesday_2','$start_time_thursday_2','$end_time_thursday_2','$start_time_friday_2','$end_time_friday_2','$start_time_saturday_2','$end_time_saturday_2')";
            
           
            if ($connection->query($sql) === TRUE) {
                echo "Data inserted successfully";

            }

            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


}
        


       
   
}
?>
