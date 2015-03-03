<?php
	/** Code is poetry **/
	session_start();
	include 'connect.php';
	
	if(isset($_POST['Post']))
	{
		$id = $_SESSION['id'];
		$post = $_POST['Post'];
		
		$post = trim($post);
		
		$sql = "UPDATE `lettergard`.`user` SET `userMail` = '$post', `userValidated` = 0 WHERE `user`.`userID` = $id";
		mysqli_query($conn, $sql);
	}
	
	mysqli_close($conn);
?>