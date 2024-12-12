<?php


session_start();

$docID = $_SESSION["doc_Id"];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Edit Profile</h1>
  <hr>
  <div class="row">
    <div class="col-md-3">
      <div class="text-center">
        <img src="" width="200px" height="200px" class="avatar img-circle" alt="avatar">
        <h6>Upload a photo..</h6>
        <input type="file" class="form-control" name="profilePhoto" form="profileForm">
      </div>
    </div>
    
    <div class="col-md-9 personal-info">
     
      <h3>Personal info</h3>
      
      <form id="profileForm" class="form-horizontal" role="form" action="others/docprofileUpdateProcess.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="docID" value="<?php echo $docID; ?>">
        <div class="form-group">
          <label class="col-lg-3 control-label">User Name:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="docName" placeholder="Username">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" type="email" name="docemail" placeholder="Email">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8">
            <input type="submit" id="edtProfile" class="btn btn-primary" value="Save Changes">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<hr>

<script type="text/javascript">
  $(document).ready(function() {
    $('#profileForm').submit(function(e) {
      e.preventDefault(); // Prevent the form from submitting the default way

      var formData = new FormData(this); // Use FormData to capture the form data

      $.ajax({
        type: 'POST',
        url: 'others/docprofileUpdateProcess.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
         response = JSON.parse(response);

          if (response.newImageUrl) {
            $('.avatar').attr('src', response.newImageUrl);
          } else {
            alert('Profile updated successfully, but no new image URL was provided.');
          }
        },
        error: function() {
          alert('Error processing request');
        }
      });
    });
  });
</script>

</body>
</html>
