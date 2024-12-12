
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Doctor Login</title>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    
    .btn-color{
  background-color:#0e1c36;
  color: #fff;
  
}  

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}


  </style>

</head>
<body>

<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center text-dark mt-5">Login</h1>
        
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="others/loginOther.php" method="post">

            

            <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                placeholder="User Name">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            
            <div class="text-center"><button type="submit" name="login_submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>

            <div id="emailHelp" class="form-text text-center mb-5 text-dark"> <a href="#" class="text-dark fw-bold">  frogotten password?</a>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>

  </body>
</html>
