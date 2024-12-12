<?php

include 'dBconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $patient_id=$_POST['patient_id'];  
  $appo_id=$_POST['appo_id'];
  $doc_id=$_POST['doc_id'];

  $query_data = "SELECT * FROM patient_info WHERE p_Id='$patient_id';";
  $result_data = mysqli_query($connection, $query_data);

  if (mysqli_num_rows($result_data) > 0){
    while ($row_data = mysqli_fetch_array($result_data)){
      $name = $row_data['p_Name'];
      $age = $row_data['p_Age'];
    } 
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor's Patient Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .container-box {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    text-align: center;
  }
  label {
    font-weight: bold;
  }
  input[type="text"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  textarea {
    height: 150px;
  }
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }
  .checkbox-group {
    margin-bottom: 10px;
  }
  .checkbox-group label {
    margin-right: 10px;
  }
</style>
</head>
<body>

<div class="container-box">
  <h1>Doctor's Patient Details</h1>

  <form id="patientForm" method="post" action="others/process_detailsWrite.php">

    <input type="hidden" id="doc_id" name="doc_id" value="<?php echo $doc_id; ?>">
    <input type="hidden" id="pa_id" name="pa_id" value="<?php echo $patient_id; ?>">

    <label for="appo_id">Appointment No:</label>
    <input type="text" id="appo_id" name="appo_id" value="<?php echo $appo_id; ?>">

    <label for="patientName">Patient Name:</label>
    <input type="text" id="patientName" name="patientName" value="<?php echo $name; ?>">

    <label for="patientAge">Patient Age:</label>
    <input type="number" id="patientAge" name="patientAge" value="<?php echo $age; ?>">

    <label for="medicalCondition">Medical Condition and History:</label>
    <textarea id="medicalCondition" name="medicalCondition" required ></textarea>

    <label for="currentMedication">Current Medication:</label>
    <textarea id="currentMedication" name="currentMedication" required></textarea>

    <div class="checkbox-group">
      <label>Reports to Obtain:</label><br>
      
      <input type="checkbox" id="bloodTest" name="reports[]" value="Blood Test">
      <label for="bloodTest">Blood Test</label>
      
    
      <input type="checkbox" id="ecg" name="reports[]" value="Thyroid">
      <label for="ecg">Thyroid Test</label>
      
      <input type="checkbox" id="ultrasound" name="reports[]" value="Electrolyte">
      <label for="ultrasound">Electrolyte Test</label>
      
      
      
    
      <input type="text" id="otherReport" name="otherReport" placeholder="Specify other report">
    </div>

    <button type="submit" name="details_submit">Save Details</button>

  </form>
</div>

</body>
</html>
