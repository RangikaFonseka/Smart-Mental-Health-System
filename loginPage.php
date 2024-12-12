
<?php

include "IntroHeader.php";

?>



<!DOCTYPE html>
<html>
<head>
<style>


body {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background:url('img/loginImg.jpg');
  background-size: cover; 
  background-position: center; 
}


* {
  box-sizing: border-box;
}


.container {
  margin:25px;
  width: 100%;
  max-width: 500px;
  padding: 16px;
  background-color:#b3e6ff;
  border-radius: 1rem;
  
}

h1{
display: flex;
justify-content: center;
padding-top:30px;
padding-bottom: 30px;
font-size: 3rem;

}

.registerbtn{

align-items: center;
font-size: 120%;
text-transform: none;




}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}





.clearfix {
  display: flex;
  justify-content: center;
  padding-top:10px;
  padding-bottom:10px;
}


button {
  background-color: #5776f2;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border-radius: 1rem;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity: 1;
}

.signupbtn {



  width: 70%;
}


@media screen and (max-width: 300px) {
  .signupbtn {
    width: 100%;
  }
}


</style>
</head>


<body>

<div class="container">


<div id="errorMessage" style="color: red; display: none;"></div>
  
  <h1>Login</h1>

<form action="others/patientLoginOther.php" method="post">
      <input type="text" placeholder="Enter User Name Or Email" name="userName" required>
    <input type="password" placeholder="Enter Password" name="psw" required>

    
   
    <div class="clearfix">
      <button type="submit" class="signupbtn" name="pat_login_submit">Login</button>
    </div>

    <center><p class="registerbtn">don't have a account <a href="signPage.php">Register</a></p></center>
  
</form>
</div>





</body>
</html>
