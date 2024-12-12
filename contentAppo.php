
<?

session_start();

$doctorID=$_SESSION["doc_Id"];
                
  $sql ="SELECT appointment_info.*, patient_info.* 
        FROM appointment_info 
        INNER JOIN patient_info ON appointment_info.patient_Id = patient_info.p_Id 
        WHERE doctor_Id = '$doctorID'";


                 $result = $connection->query($sql);


                    if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)){ 


                    
                     $_SESSION['patient_id'] = $row['p_Id'];
                     $_SESSION['appointmentId']=$row['apo_Id'];

?>


                        <div class="col">
                       <div class='col-md-4'>
                            <div class='card mb-4 box-shadow'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $row['p_Name'] . "</h5>
                                    <p class='card-text'>Age: " . $row['p_Age'] . "</p>
                                    <p class='card-text'>Gender: " . $row['p_Gender'] . "</p>
                                    <p class='card-text'>Contact: " . $row['p_Contact'] . "</p>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-sm btn-outline-secondary'>View Details
                                            </button>

                                            <button type='button' class='btn btn-sm btn-outline-danger'> start
                                            </button>

                                            <a href='detailsWrite.php' class='btn btn-sm btn-outline-secondary'>Write Conclusion</a>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                     <?php
                     
                            }

                        }


             else {
                echo "<p>No new patients found.</p>";
            }

                     ?>   