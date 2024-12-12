1<?php

session_start();

include "subHeader.php";
include "dBConn.php";

$p_ID = $_SESSION["patient_id"];

$query="SELECT * FROM patient_info  WHERE p_Id ='$p_ID'";

$sql_Result=$connection->query($query);





                            if(mysqli_num_rows($sql_Result)>0){

                                while ($rowInfo=mysqli_fetch_array($sql_Result)) {

                                 

                                    $name=$rowInfo['p_Name'];
                                    $nic=$rowInfo['p_Nic'];
                                    $mail=$rowInfo['p_Email'];
                                    $age=$rowInfo['p_Age'];
                                    $gender=$rowInfo['p_Gender'];
                                    $contact=$rowInfo['p_Contact'];
                                    $imgPath=$rowInfo['p_Img'];

   
                               }

                            }

                            $path=str_replace('../', '', $imgPath);

                            
                   
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

 <style>
     

body{
   
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;   



}
.container{

font-size: 120%;


}
.main-body {
    margin-top:120px;
   
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;

    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

 </style>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm">

            <div class="col-md-4 mb-3">

              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

                    <img src="<?php echo $path  ?>" alt="<?php echo $path?>" class="rounded-circle" width="150">

                    <div class="mt-3">
                        <h4><?php echo $name; ?></h4>

                       <a href="profileEdit.php"> <button class="btn btn-primary">Edit Profile</button> </a>
                      
                    </div>


                  </div>

                </div>
              </div>

              <div class="card mt-3">

                <ul class="list-group list-group-flush">

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                   <a href=""> <h6 class="mb-0" style="font-size:15px;">Reports</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href=""><h6 class="mb-0 " style="font-size:15px;">Activity Status</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href=""><h6 class="mb-0" style="font-size:15px;">Feedback</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href=""><h6 class="mb-0" style="font-size:15px;">Patment Summury</h6></a>
                    
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href=""><h6 class="mb-0" style="font-size:15px;">Loyalty</h6></a>
                    
                  </li>
                </ul>

              </div>

            </div>


            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $name; ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $mail; ?>
                    </div>
                  </div>

                    <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIC</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $nic; ?>
                    </div>
                  </div>


                    <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $age; ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $gender; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $contact; ?>
                    </div>
                  </div>

                  <hr>
                 
                </div>
              </div>

              <div class="row gutters-sm">

                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">

                    
                    <h6>Login through Mobile </h6>

                    <p>Mobile app QR code for mobile app accessScan the QR code with your mobile app and you will be automatically logged in. </p>

                    <button class="btn btn-primary">QR Generate</button>
                 
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">

                    
                    <h6>First access to site </h6>
                    <p>Thursday, 12 March 2020, 2:17 PM  (4 years 76 days)</p>
                    <h6>Last access to site </h6>
                    <p>Thursday, 12 March 2020, 2:17 PM  (4 years 76 days)</p>

                    </div>
                  </div>
                </div>

              </div>



            </div>
          </div>

        </div>
    </div>
</body>
</html>