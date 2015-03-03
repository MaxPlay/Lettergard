<?php
	/** Code is poetry **/
	session_start();
	include 'connect.php';
	
	if(isset($_POST['Post']))
	{
		$id = $_SESSION['id'];
		$post = $_POST['Post'];
		$sql = "UPDATE `lettergard`.`user` SET `userBio` = '$post' WHERE `user`.`userID` = $id";
		mysqli_query($conn, $sql);
	}
	
	mysqli_close($conn);
?>