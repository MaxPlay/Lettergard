<?php
	session_start();
	include 'connect.php';
	include 'lib.php';
	include 'userApi.php';
	
	if(FolgstDu() == 1)
	{
		$sql = "DELETE FROM `follow` WHERE `followFollow` = '".$_SESSION['visit']."' AND `followFollower` = '".$_SESSION['id']."'";
	}
	else
	{
		$sql = "INSERT INTO `follow`(`followID`, `followFollow`, `followFollower`) VALUES (null,'".$_SESSION['visit']."','".$_SESSION['id']."')";
	}
		mysqli_query($conn, $sql);
		mysqli_close($conn);
?>