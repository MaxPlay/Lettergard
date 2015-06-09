<?php
/** Code is poetry **/
	session_start();

include 'connect.php';
include 'userApi.php';

	$filename = getHash($_SESSION['id']);
		
	$sql = "DELETE FROM `lettergard`.`user` WHERE `user`.`userID` = '".$_SESSION['id']."' LIMIT 1;";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`follow` WHERE `follow`.`followUser` = '".$_SESSION['id']."' OR `user`.`followFollower` = '".$_SESSION['id']."'  ;";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`fav` WHERE `fav`.`favUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`posts` WHERE `posts`.`postUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`reblog` WHERE `reblog`.`reblogUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
	$sql = "DELETE FROM `lettergard`.`settings` WHERE `settings`.`settingsUser` = '".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
						
	$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
	if (count($files) == 1)
	{
		unlink($files[0]);
	}
	
	include 'logout.php';
	
	mysqli_close($conn);
	header("location:front.php?byebye=1");
?>