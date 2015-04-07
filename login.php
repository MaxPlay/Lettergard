<?php
/** Code is poetry **/
	session_start();
	
	include 'connect.php';
	include 'pbkdf2.php';
	
	$usermail = $_POST["Mail"];
	$password = $_POST["Password"];
	
	
	$db_check_user = "SELECT userMail, userPassword, userName FROM user WHERE userMail LIKE '$usermail' OR userName LIKE '$usermail' LIMIT 1";
	$db_check_user_output = mysqli_query($conn, $db_check_user);
	$db_check_user_output_query = mysqli_fetch_object($db_check_user_output);
	
	if (validate_password($password, $db_check_user_output_query->userPassword))
		{
			
	$db_check_user = "SELECT * FROM user WHERE userMail LIKE '$usermail' OR userName LIKE '$usermail' LIMIT 1";
	$db_check_user_output = mysqli_query($conn, $db_check_user);
	$db_check_user_output_query = mysqli_fetch_object($db_check_user_output);
	
		$_SESSION['id'] = $db_check_user_output_query->userID;
		$_SESSION['name'] = $db_check_user_output_query->userName;
		$_SESSION['premium'] = $db_check_user_output_query->userPremium;
		$_SESSION['visit'] = $_SESSION['id'];
		mysqli_close($conn);
		
		header("location:index.php?loginnew=1");
		}
	else
		{
		mysqli_close($conn);
		header("location:front.php?error=1");
		}
?>