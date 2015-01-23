<?php
/** Code is poetry **/
	session_start();

$conn = mysql_connect("localhost","root","pXTK8xFPyhfvK5EE")
		or die("Connection failed.");

					mysql_select_db("lettergard") or die("Datenbank konnte nicht ausgewählt werden");
	include 'pbkdf2.php';
	
	$usermail = $_POST["Mail"];
	$password = $_POST["Password"];
	$Name = $_POST["UserName"];
	
	$sql = "INSERT INTO user(userID, userName, userPassword, userMail, userRegister, userBio, userNickname, userWebsite, userHome, userPremium, userValidated) 
						VALUES (NULL,'$Name','" . create_hash($password) . "','$usermail','" . date('Y-m-d') . "','','$Name','','','0','0')";
	
	echo $sql;
	$result = mysql_query($sql);
	echo mysql_error();
	echo $result;
	if ($result == true) {
		$db_check_user = "SELECT * FROM user WHERE userMail LIKE '$usermail' LIMIT 1";
		$db_check_user_output = mysql_query($db_check_user);
		$db_check_user_output_query = mysql_fetch_object($db_check_user_output);
	
		$_SESSION['id'] = $db_check_user_output_query->userID;
		$_SESSION['name'] = $db_check_user_output_query->userName;
		$_SESSION['premium'] = $db_check_user_output_query->userPremium;
		
		echo "s";
		
		header("location:index.php?loginnew=1");
		}
	else
		{
			echo "3";
		//header("location:front.php?error=1");
		
		}
?>