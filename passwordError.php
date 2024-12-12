




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
  background: linear-gradient(to top right, #0000ff 1%, #66ffff 88%);

}

* {
  box-sizing: border-box;
}


.container {
  margin:25px;
  width: 100%;
  max-width: 500px;
  padding: 16px;
  background-color: white;
  border-radius: 1rem;
  
}

h1{
display: flex;
justify-content: center;
padding-top:30px;
padding-bottom: 30px;
font-size: 3rem;

}


/* Full-width input fields */
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


/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .signupbtn {
    width: 100%;
  }
}


</style>
</head>


<body>

  



<div class="container">

  <h1>Login Failur</h1>

  <div class="loginErrorMsg">
    
    <p>Please Check Your Password or User name</p>

  </div>

    <p> <a href="loginPage.php" style="color:dodgerblue">Try Agian</a>.</p>

    <p>creating a New account <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

  </div>

</body>
</html>
