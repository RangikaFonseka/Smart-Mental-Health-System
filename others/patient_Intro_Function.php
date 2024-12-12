<?php  

include "../testCase.php";

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



function isValidEmptySignInput($Username,$Email,$age,$nic,$telephone,$passwords,$passwords_repete){

	$result;


	if(empty($Username) || empty($Email) ||empty($age) || empty($nic)  || empty($telephone) || empty($passwords_repete) || empty($passwords)){

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

$sql="select * from patient_info where  p_Name=?;";

$stmt=mysqli_stmt_init($connection);

if(!mysqli_stmt_prepare($stmt,$sql)){

	header("Location:../loginPage.php?error=stmtfaild");
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


function pa_login($connection,$Username,$passwords){

	 $valid_User_Exist=UserExists($connection,$Username,$passwords);

	 if($valid_User_Exist===false){

	 	 testCaseGenerate('Login Test', 'Unsuccess',' user does not exist');
		
	    exit();

	 }



	  $hashedpsw=$valid_User_Exist["p_password"];
	 

	  $verifypsw=password_verify($passwords,$hashedpsw);

	  if( $verifypsw===false){

	  	 header("Location:../passwordError.php");
        
	  //logActivity($connection,$valid_User_Exist["userId"],"Login Faliure");

	  	 testCaseGenerate('Login Test', 'Unsuccess',' password not match');
	  		
	  		exit();
	  } 

	  else if($verifypsw===true){

	  	session_start();
	  	
	  	$_SESSION["patient_id"]=$valid_User_Exist["p_Id"];
	  	$_SESSION["patient_Name"]=$valid_User_Exist["p_Name"];
	  	$_SESSION["p_Img"]=$valid_User_Exist["p_Img"];
	  	//logActivity($connection,$valid_User_Exist["userId"],"Login success");
	  	 testCaseGenerate('Login Test', 'Success','password Match');

       header("Location:../landPage.php");
	 }
}






function setupSinupInfo($connection,$Username,$Email,$age,$gender,$nic,$telephone,$passwords){



	$sql = "INSERT INTO patient_info(p_Name,p_Nic,p_Email,p_Age,p_Gender,p_Contact, p_password) VALUES (?,?,?,?,?,?,?);";

	$stmt = mysqli_stmt_init($connection);

	if(!mysqli_stmt_prepare($stmt,$sql)){

		echo '<script type="text/javascript">';
        echo 'alert("Sorry,Some Error !");';
        echo 'window.location.href = "signPage.php";';
        echo '</script>';
	        exit();
	}


	$options = ['cost' => 12]; // You can adjust the cost parameter based on your server's performance
   $hashedpassword = password_hash($passwords, PASSWORD_BCRYPT, $options);


	//$hashedpassword=password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"sssisis",$Username,$nic,$Email,$age,$gender,$telephone,$hashedpassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

      
}

?>
