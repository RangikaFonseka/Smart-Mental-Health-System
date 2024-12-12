<?php

require_once "../dBConn.php";
require_once "introFunction.php";



if(isset($_POST["Sign_submit"])){


	$Username=$_POST["Username"];
	$age=$_POST["age"];
	$telephone=$_POST["telephone"];
	$passwords=$_POST["passwords"];
	$passwords_repete=$_POST["passwords_repete"];
	
	
	$isValidEmptySignInput=isValidEmptySignInput($Username,$age,$telephone,$passwords,$passwords_repete);
	$isValidUsername=checkUsername($Username);
	//$isValidEmail=checkEmail($email);
	$isValidPwd=checkPwd($passwords,$passwords_repete);
	$isUserExists=UserExists($connection,$Username);



	if($isValidEmptySignInput==! false){


	    exit();

	}

	if($isValidUsername==!false){

			echo '<script type="text/javascript">';
        echo 'alert("Sorry,Invalid User Name !");';
        echo 'window.location.href = "../docSign.php";';
        echo '</script>';
	        exit();




	}
	if($isValidPwd==!false){

			echo '<script type="text/javascript">';
        echo 'alert("Sorry,Invalid Password !");';
        echo 'window.location.href = "../docSign.php";';
        echo '</script>';
	        exit();


	}
	if($isUserExists==!false){

			echo '<script type="text/javascript">';
        echo 'alert("Sorry,Invalid User Name !");';
        echo 'window.location.href = "../docSign.php";';
        echo '</script>';
	        exit();


	}


	  setupSinupInfo($connection,$Username,$age,$telephone,$passwords);



}



?>