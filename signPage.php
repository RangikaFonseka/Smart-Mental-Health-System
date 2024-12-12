
<?php

include "IntroHeader.php";

?>

<!DOCTYPE html>
<html>
<style>
body 


{font-family: Arial, Helvetica, sans-serif;}


* {

  box-sizing: border-box
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

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
  margin-top:85px;
  padding: 25px;
  font-size: 125%;
}


.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="others/signOther.php" method="post" style="border:1px solid #ccc">

  <div class="container">
    

    <label for="email"><b>User Name</b></label>
    <input type="text" placeholder="Enter User Name" name="Username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="email"><b>NIC</b></label>
    <input type="text" placeholder="Enter NIC" name="nic" required>

    <label for="email"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" required>

    <label for="email"><b>Gender</b></label>
    <input type="text" placeholder="You Gender" name="gender" required>

    <label for="email"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact Number" name="telephone" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="Sign_submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
