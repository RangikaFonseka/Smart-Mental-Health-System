<?php
include "../dBConn.php";

session_start();


 

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sidebar Interface</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        position: fixed;
        top:20px;
        left: 0;
        height: calc(100% - 20px);
        width: 220px;
        background: #CB356B;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #BD3F32, #CB356B);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #BD3F32, #CB356B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */



        padding-top: 55px; /* Height of the topbar */
    }

    .sidebar a {
        padding: 20px 15px;
        display: flex;
        color: #fff;
        text-decoration: none;

    }


    .sidebar a i{
       padding-left: 15px;
       font-size:1.5rem;
        
    }

      .sidebar a .name {
        position: relative;
        left:20px;
    }




    .sidebar a:hover {
        background-color: #ffffff;
        text-decoration: none; 
        color: black;
    }




    .content {
        margin-top: 50px;
        margin-left: 250px; 
        padding: 20px;
    }

    


   .filter-bar {
   
    padding:20px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px;
    gap: 10px;
}



.filter-bar label {

    margin-right: 5px;
}



#appointments-list {

    margin-top: 20px;
    
}



.card {

    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }


    @media (max-width:1000px){

        .sidebar .name {
        display: none; 
    }

        .sidebar{

            width: 70px;

        }

         .content {

            margin-left:70px;
            width: calc(100% - 70px);
       
       }

    }

</style>
</head>
<body>




  <nav class="navbar navbar-expand-lg nnavbar-light fixed-top" style="background-color: #CB356B;">
      <div class="container">
         <a class="navbar-brand" href="#">Admin Panale</a>
      </div>
   </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        
    <a href="#" onclick="showContent('home')"><i class="fa-solid fa-gauge"></i> <div class="name">Home</div></a>
    <a href="#" onclick="showContent('payment')"> <i class="fa-solid fa-credit-card"></i> <div class="name">Payment</div></a>

    <a href="#" onclick="showContent('Patients')"> <i class="fas fa-user"></i><div class="name">Patients</div></a>
    <a href="#" onclick="showContent('doctor')"> <i class="fa fa-stethoscope" aria-hidden="true"></i> <div class="name">doctor</div></a>


    <a href="#" onclick="showContent('Appoinment')"> <i class="fa-regular fa-calendar-check"></i> <div class="name">Appoinment</div></a>

    

</div>




    <div class="content">

         <?php include 'adminDashboard.php' ?>

        <div id="home" style="display:none;">

             <?php include 'adminDashboard.php';  ?>
           
        </div>

        
       <div id="Patients" class="Patients" style="display:none;">


            <p>Patients Informations</p>


            <?php include "patientInfoAdmin.php"?>


        </div>

        <div id="doctor" class="doctor" style="display:none;">


            <p>Patients Informations</p>


            <?php include "docManagment.php"?>


        </div>

        <div id="payment" class="payment" style="display:none;">


            <p>Payment Informations</p>

             
            <?php include "paymentInfoAdmin.php"?>

           
        </div>





        <div id="Appoinment" style="display:none;">




            <p>Appointment Informations</p>

             
            <?php include "appoinmentInfoAdmin.php"?>

           
        </div>

           


        

      </div>



       







    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showContent(id) {
            var contents = document.getElementsByClassName('content')[0].children;
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            document.getElementById(id).style.display = 'block';
        }




       



        


    </script>
</body>
</html>
