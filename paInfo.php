<?php

require "dBConn.php";


      
    
      $doctorID=$_SESSION["doc_Id"];





$sql = "SELECT appointment_info.*, patient_info.* 
        FROM appointment_info 
        INNER JOIN patient_info ON appointment_info.patient_Id = patient_info.p_Id 
        WHERE doctor_Id = '$doctorID'"; 

$result = $connection->query($sql);
$displayed_patients = array();



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        .topic, .data {
            display: flex;
        }
        .item, .items {
            margin: 10px;
            font-size: 1.4rem;
            justify-content: center;
            align-content: center;
            width: 100%;
        }
        .hide {
            display: none;
        }
        .back-button {
            margin: 20px;
            display: none;
        }
    </style>
</head>
<body>

<div class="dataShow hide"></div>
<button class="back-button btn btn-sm btn-outline-secondary " style="display:none;">Back</button>

<div class="topic">
    <div class="item">Name</div>
    <div class="item">Age</div>
    <div class="item">L.T.D</div>
    <div class="item">More Info</div>
</div>

<?php       
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if (!in_array($row['p_Name'], $displayed_patients)) {
            $displayed_patients[] = $row['p_Name'];
            ?>
            <div class="data">
                <div class="items"><?php echo $row['p_Name']; ?></div>
                <div class="items"><?php echo $row['p_Age']; ?></div>
                <div class="items">L.T.D</div>
                <div class="items">

                    <form class="paInfo">
                        <input type="hidden" name="patient_id" class="patient_id" value="<?php echo $row['p_Id']; ?>">
                        <button type="submit" name="submit_info" class="submit_info btn btn-sm btn-outline-secondary">Show details</button>
                    </form>

                    
                </div>
                <br>
            </div>
            <?php 
        }
    }
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.submit_info', function(e) {
            e.preventDefault(); 
            var patient_id = $(this).closest('form').find('.patient_id').val();
            $.ajax({
                type: 'POST',
                url: 'sample2.php',
                data: { patient_id: patient_id },
                success: function(response) {
                    $('.topic').addClass('hide');
                    $('.data').addClass('hide');
                    $('.dataShow').removeClass('hide').html(response);
                    $('.back-button').show();
                },
                error: function() {
                    alert('Error processing request');
                }
            });
        });

        $('.back-button').click(function() {
            $('.topic').removeClass('hide');
            $('.data').removeClass('hide');
            $('.dataShow').addClass('hide').empty();
            $('.back-button').hide();
        });
    });
</script>   

</body>
</html>
