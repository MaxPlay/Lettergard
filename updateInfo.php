<?php
	/** Code is poetry **/
	session_start();
	include 'connect.php';
	
	if(isset($_POST['Nickname']))
	{
		$id = $_SESSION['id'];
		$name = $_POST['Nickname'];
		$sql = "UPDATE `user` SET `userNickname` = '$name' WHERE `user`.`userID` = $id";
		mysqli_query($conn, $sql);
	}
	
	if(isset($_POST['Website']))
	{
		$id = $_SESSION['id'];
		$site = $_POST['Website'];
		$sql = "UPDATE `user` SET `userWebsite` = '$site' WHERE `user`.`userID` = $id";
		mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
	//header("location:settings.php?id=2");
?>