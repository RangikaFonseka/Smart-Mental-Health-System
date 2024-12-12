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
        <form id="apo-form" class="form-inline">
            <div class="form-group">
                <label for="pa_ID" class="sr-only">Patient Name:</label>
                <input type="text" class="form-control" id="pa_ID" name="pa_ID"
                 placeholder="Patient ID">
            </div>
            
            <button type="button" class="btn btn-primary" onclick="filterappo()">Filter</button>
        </form>

        <div id="loading-spinner" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>

        <div id="apo-list"></div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function filterappo() {
            const apoData = $('#apo-form').serialize();
            $('#loading-spinner').show();
            $.ajax({
                url: 'appoinmentProcess.php',
                type: 'POST',
                data: apoData,
                success: function(response) {
                    $('#loading-spinner').hide();
                    $('#apo-list').html(response);
                },
                error: function(error) {
                    $('#loading-spinner').hide();
                    console.log(error);
                }
            });

            console.log(apoData);
        }
    </script>
</body>
</html>
