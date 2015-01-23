<?php
	session_start();
	
	if(isset($_SESSION['id']))
		header('Location:index.php');
?>
<html>
	<head>
		<title>lettergard</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/front.css">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/base.js"></script>
		<script src="js/jQueryStuff.js"></script>
	</head>
	<body>
		<header>
			<div class="content">
				<div style="float:left;width:50px;">&nbsp;</div>
				<span class="title">lettergard</span>
				<div style="float:left;width:100px;">&nbsp;</div>
				<div class="login">Anmelden
					<form class="loginVolume" style="display:none;">
						<div class="firstelement"></div>
						<div class="loginelement">Email<input type="textbox" class="loginbar" name="Mail" required></div>
						<div class="loginelement">Password<input type="textbox" class="loginbar" name="Password" required></div>
						<div class="loginelement"><button type="submit" class="loginbutton">Login</button></div>
						<div class="finalelement"></div>
					</form>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<div class="frontcontent">
				
			</div>
			<div class="frontfooter">
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
			</div>
		</div>
	</body>
</html>