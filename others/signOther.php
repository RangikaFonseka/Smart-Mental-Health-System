<?php

require_once "../dBConn.php";
require_once "patient_Intro_Function.php";



if(isset($_POST["Sign_submit"])){


	$Username=$_POST["Username"];
	$Email=$_POST["email"];
	$age=$_POST["age"];
	$nic=$_POST['nic'];
    $gender=$_POST["gender"];
	$telephone=$_POST["telephone"];
	$passwords=$_POST["psw"];
	$passwords_repete=$_POST["psw-repeat"];
	
	

	$isValidEmptySignInput=isValidEmptySignInput($Username,$Email,$age,$gender,$nic,$telephone,$passwords,$passwords_repete);
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
        echo 'window.location.href = "../signPage.php";';
        echo '</script>';
	        exit();



	}
	if($isValidPwd==!false){

			echo '<script type="text/javascript">';
        echo 'alert("Sorry,Invalid User Password !");';
        echo 'window.location.href = "../signPage.php";';
        echo '</script>';
	        exit();


	}
	if($isUserExists==!false){

			echo '<script type="text/javascript">';
        echo 'alert("Sorry,Already User Exsist !");';
        echo 'window.location.href = "../signPage.php";';
        echo '</script>';
	        exit();

	}


	  setupSinupInfo($connection,$Username,$Email,$age,$gender,$nic,$telephone,$passwords);



}



?>