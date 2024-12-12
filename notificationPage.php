<?php

 include "dBConn.php";
session_start();

$ID = $_SESSION["patient_id"];

 $query_data = "SELECT * FROM notifications WHERE patient_id='$ID'";
 $result_data = mysqli_query($connection, $query_data);



include "subHeader.php";


?>


<!doctype html>
 <html>
 <head>
   <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Snippet - GoSNippets</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

body {
    font-family: "Roboto", sans-serif;
    background: #EFF1F3;
    min-height: 100vh;
    position: relative;
    font-size: 135%;
}

.section-50 {
    margin-top:35px;
    padding: 50px 0;
   
    min-height:70vh;
}

.m-b-50 {
    margin-bottom: 20px;
}

.dark-link {
    color: #333;
}

.heading-line {
    position: relative;
    padding-bottom: 5px;
}

.heading-line:after {
    content: "";
    height: 4px;
    width: 75px;
    background-color: #29B6F6;
    position: absolute;
    bottom: 0;
    left: 0;
}

.notification-ui_dd-content {
    margin-bottom: 30px;

}

.notification-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 20px;
    margin-bottom: 7px;
    background: #fff;
    -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
}

.notification-list--unread {
    border-left: 2px solid #29B6F6;
}

.notification-list .notification-list_content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}

.notification-list .notification-list_content .notification-list_img img {
    height: 48px;
    width: 48px;
    border-radius: 50px;
    margin-right: 20px;
}

.notification-list .notification-list_content .notification-list_detail p {
    margin-bottom: 5px;
    line-height: 1.2;
}

.notification-list .notification-list_feature-img  {
    

    font-size: 2.3rem;
    border-radius: 5px;
    margin-left: 20px;
}

.read-icon {
    color: green; /* Change this to your desired color */
}


</style>


<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>

<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>
                            
<body oncontextmenu='return false' class='snippet-body'>
  
<section class="section-50">
    <div class="container">
        <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

        <div class="notification-ui_dd-content">

         <?php

          if (mysqli_num_rows($result_data) > 0){


    while ($row_data = mysqli_fetch_array($result_data)){

          $message = $row_data['message'];
          $otherMsg = $row_data['otherMsg'];
          $is_read = $row_data['is_read'];
          $created_at = $row_data['created_at'];
          $report_req = $row_data['report_req'];
          $notify_id = $row_data['notify_id'];
          $sessionID = $row_data['sessionID'];



        $sql = "SELECT do_Id FROM session_info WHERE session_Id = $sessionID";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
     
          $row = mysqli_fetch_assoc($result);
             $doc_ID=$row['do_Id'];
         } 

        




        $sql = "SELECT doc_Name FROM doctors WHERE doc_Id = $doc_ID";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
     
          $row = mysqli_fetch_assoc($result);
          $doc_Name=$row['doc_Name'];
         } 
         
         else {
          echo "No doctor found.";
           }




        ?> 







           <div class="notification-list notification-list<?php echo $is_read == 0 ? '--unread' : ''; ?>">
    <div class="notification-list_content">
        <div class="notification-list_detail">
            <p><b>Date</b><?php echo "  $created_at"; ?></p>
            <p><b>Doctor Dr.</b><?php echo "  $doc_Name"; ?> required post</p>
            <p class="text-muted"> required <?php echo $message  ?></p>

            <?php if ($report_req == 1) { ?>
                <form action="reportSubmit.php" method="post">
                    <input type="hidden" name="notifyID" value="<?php echo $notify_id ?>">
                    <input type="hidden" name="sessionID" value="<?php echo $sessionID ?>">
                    <button type="submit" name="reportSubmit">Upload Report</button>
                </form>
            <?php } ?>
        </div>
    </div>

    <div class="notification-list_feature-img">
        <i class="fa fa-check-circle <?php echo $is_read == 1 ? 'read-icon' : ''; ?>" aria-hidden="true"></i>
    </div>
</div>


            <?php

           }
        }


            ?>
 

        </div>

        
    </div>
</section>

<script type='text/javascript'>
    
</script>
</body>
</html>