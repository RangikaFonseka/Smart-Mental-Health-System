<?php



require_once "../dBConn.php";
require_once "patient_Intro_Function.php";

if(isset($_POST["pat_login_submit"])){

	$username=$_POST["userName"];
	$password=$_POST["psw"];
	

  pa_login($connection,$username,$password);
		
	
}

?>

