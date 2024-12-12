<?php

require_once "../dBConn.php";
require_once "function.php";

if(isset($_POST["submit"])){

    $Name=$_POST["name"];
    $Nic=$_POST["nic"];
    $Doctor=$_POST["doctor"];
    $Date = $_POST["date"];
    




            $sql = "SELECT * FROM patient_info WHERE p_Nic = '$Nic' "; 
            $result = $connection->query($sql);

             if(mysqli_num_rows($result)>0){
                while($row_data = mysqli_fetch_array($result)){
                  
                $patient_id=$row_data['p_Id'];

                 }

             }


            $sqlqry = "SELECT * FROM doctors WHERE doc_Name = '$Doctor' "; 
            $resultqry = $connection->query($sqlqry);

             if(mysqli_num_rows($resultqry)>0){
                while($row_dataqry = mysqli_fetch_array($resultqry)){
                  
                $doc_id=$row_dataqry['doc_Id'];  

               }
               
               }  



createAppointment($patient_id,$doc_id,$Date);


}



?>