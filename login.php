<?php
/** Code is poetry **/
	session_start();
	
	include 'connect.php';
	include 'pbkdf2.php';
	
	$usermail = $_POST["user"];
	$password = $_POST["pw"];
	
	
	$db_check_user = "SELECT userMail, userPassword FROM user WHERE userMail LIKE '$usermail' LIMIT 1";
	$db_check_user_output = mysql_query($db_check_user);
	$db_check_user_output_query = mysql_fetch_object($db_check_user_output);
	
	if ($db_check_user_output_query->userPassword == validate_password($password))
		{
			
	$db_check_user = "SELECT * FROM user WHERE userName LIKE '$usermail' LIMIT 1";
	$db_check_user_output = mysql_query($db_check_user);
	$db_check_user_output_query = mysql_fetch_object($db_check_user_output);
	
		$_SESSION['id'] = $db_check_user_output_query->userID;
		$_SESSION['name'] = $db_check_user_output_query->userName;
		$_SESSION['premium'] = $db_check_user_output_query->userPremium;
		
		header("location:index.php?loginnew=1");
		}
	else
		{
		header("location:front.php?error=1");
		}
?>