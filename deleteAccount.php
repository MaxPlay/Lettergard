<?php
/** Code is poetry **/
	session_start();

include 'connect.php';

	$_SESSION['id'];
		
	$sql = "DELETE FROM `lettergard`.`user` WHERE `user`.`userID` = '".$_SESSION['id']."' LIMIT 1;";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`follow` WHERE `user`.`followFollow` = '".$_SESSION['id']."' OR `user`.`followFollower` = '".$_SESSION['id']."'  ;";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`fav` WHERE `user`.`favUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`posts` WHERE `user`.`postUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`reblog` WHERE `user`.`reblogUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`settings` WHERE `user`.`settingsUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	
	
	$filename = $_SESSION['id'] . $_SESSION['name'];
						
	$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
	if (count($files) == 1)
	{
		unlink($files[0]);
	}
	
	include 'logout.php';
	
	mysqli_close($conn);
	header("location:front.php?byebye=1");
?>