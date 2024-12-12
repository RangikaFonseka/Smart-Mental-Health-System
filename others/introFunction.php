<?php  



function empty_LoginInput($userName,$pwd){


$result;
	if(empty($userName) || empty($pwd) ){



		$result=true;
		
	}

	else{


		$result=false;
	}

	return $result;



}



function isValidEmptySignInput($Username,$age,$telephone,$passwords,$passwords_repete){
	$result;
	if(empty($Username) || empty($age) || empty($telephone) || empty($passwords_repete) || empty($passwords)){

			$result=true;



	
	}

	else{


		$result=false;
	}

	return $result;

}





	function checkUsername($Username){

			$result;
			if(!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
         
              $result = true;


			}

			else {

				$result=false;

			}

			return $result;

	 }


function checkPwd($passwords,$passwords_repete){

			$result;

			if($passwords===$passwords_repete){
         
              $result = false;


			}

			else {

				$result=true;

			}

			return $result;

	 }


function UserExists($connection,$Username){

$sql="select * from doctors where  doc_Name=?;";

$stmt=mysqli_stmt_init($connection);

if(!mysqli_stmt_prepare($stmt,$sql)){

	     echo '<script type="text/javascript">';
        echo 'alert("Sorry,Some Problem!");';
        echo 'window.location.href = "../docLogin.php";';
        echo '</script>';
	        exit();
}

mysqli_stmt_bind_param($stmt,"s",$Username);
mysqli_stmt_execute($stmt);
$resultData=mysqli_stmt_get_result($stmt);

if($rowData = mysqli_fetch_assoc($resultData)){

	return $rowData;

}



else {


	return false;
}

   mysqli_stmt_close($stmt);

}


function login($connection,$Username,$passwords){

	 $valid_User_Exist=UserExists($connection,$Username,$passwords);

	 if($valid_User_Exist===false){
		
	    exit();

	 }



	  $hashedpsw=$valid_User_Exist["docPassword"];
	 

	  $verifypsw=password_verify($passwords,$hashedpsw);

	  if( $verifypsw===false){

	  		echo '<script type="text/javascript">';
        echo 'alert("Sorry,User name or passwords Error !");';
        echo 'window.location.href = "../docLogin.php";';
        echo '</script>';
	        exit();
	  		//logActivity($connection,$valid_User_Exist["userId"],"Login Faliure");
	  		
	  		exit();
	  } 

	  else if($verifypsw===true){

	  	session_start();
	  	$_SESSION["doc_Id"]=$valid_User_Exist["doc_Id"];
	  	$_SESSION["doc_img"]=$valid_User_Exist["doc_img"];

	  
	  	//logActivity($connection,$valid_User_Exist["userId"],"Login success");

       header("Location:../doc_interface.php");
	 }
}




function setupSinupInfo($connection,$Username,$age,$telephone,$passwords){

	$sql = "INSERT INTO doctors (doc_Name,age,telephone,docPassword) values(?,?,?,?);";

	$stmt = mysqli_stmt_init($connection);

	if(!mysqli_stmt_prepare($stmt,$sql)){

		echo '<script type="text/javascript">';
        echo 'alert("Sorry,connection Error!");';
        echo 'window.location.href = "../docSign.php";';
        echo '</script>';
	        exit();
	}


	$options = ['cost' => 12]; // You can adjust the cost parameter based on your server's performance
    $hashedpassword = password_hash($passwords, PASSWORD_BCRYPT, $options);


	//$hashedpassword=password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"siis",$Username,$age,$telephone,$hashedpassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

      
}

?>
