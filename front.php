<?php
	session_start();
	
	include 'connect.php';
	
	if(isset($_SESSION['id']))
		header('Location:index.php');
?>
<html>
	<head>
		<title>lettergard</title>
		<link rel="stylesheet" type="text/css" href="css/base_green.css">
		<link rel="stylesheet" type="text/css" href="css/front.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
		<script src="js/angular.min.js"></script>
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
					<form class="loginVolume" style="display:none;" action="login.php" method="post">
						<div class="firstelement"></div>
						<div class="loginelement">Email<input type="textbox" class="loginbar" name="Mail" required></div>
						<div class="loginelement">Passwort<input type="password" class="loginbar" name="Password" required></div>
						<div class="loginelement"><button type="submit" class="loginbutton">Login</button></div>
						<div class="finalelement"></div>
					</form>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<div class="frontcontent">
				<span style="font-family:sans-serif;font-size:24px;">Willkommen auf </span><span style="font-family:'Lucida Console';font-size:40px;">lettergard</span>
				<form class="registerarea" action="register.php" method="post">
					<div class="element"><span style="font-family:'Lucida Console';font-size:24px;">Registrieren</span></div>
					<div class="element">Nutzername <input id="UserName" type="textbox" OnKeyUp="ValidateInput('UserName')" name="UserName" required></div>
					<div class="element">E-Mail Adresse <input id="Mail" type="textbox" OnKeyUp="ValidateInput('Mail')" name="Mail" required></div>
					<div class="element">Passwort <input id="PW1" OnKeyUp="ValidateInput('PW1')" type="password" name="Password" required></div>
					<div class="element">Passwort wiederholen<input id="PW2" type="password" name="RepeatPassword" OnKeyUp="ValidatePW()" required></div>
					<div class="element"><button type="submit" value="submit" name="Accept" id="submit">Ich akzeptiere die AGB</button></div>
				</form>
			</div>
			<div class="frontfooter">
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
			</div>
		</div>
	</body>
</html>