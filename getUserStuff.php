<?php
	if(isset($_GET['v']))
	{
		include "userApi.php";
		switch($_GET['v'])
		{
		case 0:
		if(isset($_GET['User']))
			echo getFollowerCount($_GET['User']);
			break;
		case 1:
		if(isset($_GET['User']))
			echo getFollowedCount($_GET['User']);
			break;
		case 2:
		if(isset($_GET['User']))
			echo getPostCount($_GET['User']);
			break;
		}
	}
?>