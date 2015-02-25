<?php
	
	/** Code is poetry **/
	session_start();
	include "userApi.php";
	if(isset($_GET['scheme']))
	{
		setScheme($_GET['scheme'], $_SESSION['id']);
		header("location:settings.php?id=4");
	}
?>