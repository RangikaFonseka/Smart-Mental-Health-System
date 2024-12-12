<?php
include "dBConn.php";

session_start();


$doctorID=$_SESSION["doc_Id"];


if (isset($_SESSION["doc_img"]))  {

    $profileImage = str_replace('../', '',$_SESSION["doc_img"]);

} else {

    $profileImage = 'doc_Profile/imgs/default.png'; // Default image
}
?>               
 

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
        background-color: #2398db;
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




  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #86c9f0;">
  <div class="container">
    <a class="navbar-brand" href="#">Doctor Control Panel</a>

    <!-- Navbar content -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- Profile image -->
        <li class="nav-item">
          <a class="nav-link" href="doc_logout.php">
            <img src="<?php echo "$profileImage"; ?>" alt="Profile Image" style="width: 40px; height: 40px; border-radius: 50%;">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- Sidebar -->
    <div class="sidebar">
        
    <a href="#" onclick="showContent('home')"><i class="fa-solid fa-gauge"></i> <div class="name">Home</div></a>

    <a href="#" onclick="showContent('setting')"><i class="fa-solid fa-gears"></i><div class="name">Setting</div></a>

    <a href="#" onclick="showContent('payment')"> <i class="fa-solid fa-credit-card"></i> <div class="name">Payment</div></a>

    <a href="#" onclick="showContent('Patients')"> <i class="fa fa-user"></i> <div class="name">Patients</div></a>


    <a href="#" onclick="showContent('Appoinment')"> <i class="fa-regular fa-calendar-check"></i> <div class="name">Appoinment</div></a>

     <a href="#" onclick="showContent('timeSet')"><i class="fa fa-wrench" aria-hidden="true"></i><div class="name">Time Change</div></a>
     


    

</div>




    <div class="content">

         <?php include 'docDashboard.php';  ?>

        <div id="home" style="display:none;">

             <?php include 'docDashboard.php';  ?>
           
        </div>

          <div id="setting" class="setting" style="display:none;">

          
               <?php include "doc_pro_edit.php"?>

            
        </div>


       
        
       <div id="Patients" class="Patients" style="display:none;">


            <p>Patients Informations</p>


            <?php include "paInfo.php"?>


        </div>

        <div id="payment" class="payment" style="display:none;">


            <p>Payment Informations</p>

             
            <?php include "payment.php"?>

           
        </div>





        <div id="Appoinment" style="display:none;">
           


        <div class="filter-bar">

           
        <form id="filter-form" class="mb-4">

    <div class="mb-3">
        <label for="dateRange" class="form-label">Select Date Range</label>
        <select id="dateRange" name="dateRange" class="form-select" onchange="setDateRange(this.value)">
                
                <option value="today" selected>Today</option>
                <option value="last30days">Last 30 Days</option>
                <option value="custom">Custom Range</option>
                </select>
            </div>

            <div id="customDateRange" class="d-none">
                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" id="startDate" name="startDate" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" id="endDate" name="endDate" class="form-control">
                </div>
            </div>

            <input type="hidden" id="doctorID" name="doctorID" value="<?php echo $doctorID ?>">
            <button type="submit" class="btn btn-outline-secondary">Filter</button>
        </form>

        </div>

     
        <div id="appointments-list" class="row"></div>

      </div>


        <div id="timeSet" style="display:none;">

              <?php include "timeSet.php";  ?>

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







         function setDateRange(range) {
            const customDateRange = document.getElementById('customDateRange');
            const startDate = document.getElementById('startDate');
            const endDate = document.getElementById('endDate');

            const today = new Date();
            const todayStr = today.toISOString().split('T')[0];
            const last30Days = new Date();
            last30Days.setDate(today.getDate() - 30);
            const last30DaysStr = last30Days.toISOString().split('T')[0];

            if (range === 'custom') {
                customDateRange.classList.remove('d-none');
                startDate.removeAttribute('required');
                endDate.removeAttribute('required');
            } else {
                customDateRange.classList.add('d-none');
                startDate.setAttribute('required', true);
                endDate.setAttribute('required', true);

                if (range === 'today') {
                    startDate.value = todayStr;
                    endDate.value = todayStr;
                } else if (range === 'last30days') {
                    startDate.value = last30DaysStr;
                    endDate.value = todayStr;
                }
            }
        }




        $(document).ready(function() {
            $('#filter-form').on('submit', function(event) {
                event.preventDefault();
                const dateRange = $('#dateRange').val();
                let startDate = $('#startDate').val();
                let endDate = $('#endDate').val();

                if (dateRange === 'today') {
                    startDate = endDate = new Date().toISOString().split('T')[0];
                } else if (dateRange === 'last30days') {
                    startDate = new Date();
                    startDate.setDate(startDate.getDate() - 30);
                    startDate = startDate.toISOString().split('T')[0];
                    endDate = new Date().toISOString().split('T')[0];
                }

                $.ajax({
                    url: 'docAppo.php',
                    type: 'POST',
                    data: {
                        dateRange: dateRange,
                        startDate: startDate,
                        endDate: endDate

                    },
                    success: function(data) {
                        $('#appointments-list').html(data);
                    }
                });
            });
        });




    </script>
</body>
</html>
