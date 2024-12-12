<?php



require_once "../dBConn.php";
require_once "introFunction.php";

if(isset($_POST["login_submit"])){

	$username=$_POST["username"];
	$password=$_POST["password"];
	
	


		login($connection,$username,$password);
		


	}



?>

