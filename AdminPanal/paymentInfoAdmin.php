<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-inline .form-group {
            margin-right: 15px;
        }
        .form-inline {
            margin-bottom: 15px;
        }
        #loading-spinner {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Filter Appointments</h2>
        <form id="payment-form" class="form-inline">

            <div class="form-group">
                <label for="apo_ID" class="sr-only">Patient ID:</label>
                <input type="text" class="form-control" id="apo_ID" name="apo_ID" 
                placeholder="Appoinment ID">
            </div>
            
            <button type="button" class="btn btn-primary" onclick="filterAppointments()">Filter</button>
        </form>
        <div id="loading-spinner" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div id="data-list"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        function filterAppointments() {
            const formData = $('#payment-form').serialize();
            $('#loading-spinner').show();
            $.ajax({
                url:'paymentProcess.php',
                type: 'POST',
                data: formData,
                 success: function(response) {
                    $('#loading-spinner').hide();
                    $('#data-list').html(response);
                },
                error: function(error) {
                    $('#loading-spinner').hide();
                    console.log(error);
                }
               
            });

             console.log(formData);
        }

    </script>
</body>
</html>


