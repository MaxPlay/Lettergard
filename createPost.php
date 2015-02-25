<?php
	/** Code is poetry **/
	session_start();
	include 'connect.php';
	
	if(isset($_POST['Post']))
	{
		$id = $_SESSION['id'];
		$post = $_POST['Post'];
		$sql = "INSERT INTO `posts`(`postID`, `postUser`, `postText`, `postTime`) VALUES (NULL, '$id', '$post', NULL)";
		mysqli_query($conn, $sql);
	}
	
	mysqli_close($conn);
?>