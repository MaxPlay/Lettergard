<?php
/** Code is poetry **/
	session_start();

include 'connect.php';
include 'pbkdf2.php';
	
	$usermail = $_POST["Mail"];
	$password = $_POST["Password"];
	$Name = $_POST["UserName"];
	
	$sql = "INSERT INTO user(userID, userName, userPassword, userMail, userRegister, userBio, userNickname, userWebsite, userPremium, userValidated) 
						VALUES (NULL,'$Name','" . create_hash($password) . "','$usermail','" . date('Y-m-d') . "','','$Name','','0','0')";
	
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
	
		$db_check_user = "SELECT * FROM user WHERE userMail LIKE '$usermail' LIMIT 1";
		$db_check_user_output = mysqli_query($conn, $db_check_user);
		$db_check_user_output_query = mysqli_fetch_object($db_check_user_output);
	
		$_SESSION['id'] = $db_check_user_output_query->userID;
		$_SESSION['name'] = $db_check_user_output_query->userName;
		$_SESSION['premium'] = $db_check_user_output_query->userPremium;
		
		$sql = "INSERT INTO settings(settingsID, settingsUser, settingsDesign, settingsNewsletter) 
						VALUES (NULL,'".$db_check_user_output_query->userID."','0','1')";
						
		mysqli_query($conn, $sql);
	
		
		mysqli_close($conn);
		header("location:index.php?loginnew=1");
		}
	else
		{
		mysqli_close($conn);
		header("location:front.php?error=2");
		
		}
?>