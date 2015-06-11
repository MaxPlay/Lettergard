<?php
	session_start();
	include 'connect.php';
	include 'lib.php';
	include 'userApi.php';
	
	echo FolgstDu();
	
	if(FolgstDu() == 1)
	{
		$sql = "DELETE FROM `follow` WHERE `followUser` = '".$_SESSION['visit']."' AND `followFollower` = '".$_SESSION['id']."'";
	}
	else
	{
		$sql = "INSERT INTO `follow`(`followID`, `followUser`, `followFollower`) VALUES (null,'".$_SESSION['visit']."','".$_SESSION['id']."')";
	
	echo $sql;
	}
		mysqli_query($conn, $sql);
		mysqli_close($conn);
?>