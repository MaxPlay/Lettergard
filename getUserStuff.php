<?php

	session_start();
	if(isset($_GET['v']))
	{
		include "userApi.php";
		switch($_GET['v'])
		{
		case 0:
		if(isset($_SESSION['visit']))
			echo getFollowerCount($_SESSION['visit']);
			break;
		case 1:
		if(isset($_SESSION['visit']))
			echo getFollowedCount($_SESSION['visit']);
			break;
		case 2:
		if(isset($_SESSION['visit']))
			echo getPostCount($_SESSION['visit']);
			break;
		}
	}
	if(isset($_GET['Username']))
	{
		include "userApi.php";
		echo DoesUserExist($_GET['Username']);
	}
	if(isset($_GET['Nick']))
	{
		include "userApi.php";
		echo getNickname($_GET['Nick']);
	}
?>