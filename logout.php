<?php
	/** Code is poetry **/
	session_start();
	session_destroy();
	header("location:front.php?logout=1");
?>