<?php
	/** Code is poetry **/
	session_start();
	include "connect.php";
	
	if(!isset($_SESSION['id']))
		header('Location:front.php?login=0');
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
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
				<form class="searcharea">
					<input type="textbox" class="searchbar">
					<button class="searchbutton"><img src="img/search.png"></button>
				</form>
				<div style="float:left;width:100px;">&nbsp;</div>
				<div class="menu"><img src="img/menu.png">
					<form class="menuVolume" style="display:none;">
						<div class="firstelement"></div>
						<a class="menuelement" href="">Profil</a>
						<a class="menuelement" href="">Einstellungen</a>
						<a class="menuelement" href="">Hilfe</a>
						<a class="menuelement" href="">Logout</a>
						<div class="finalelement"></div>
					</form>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<nav>
				<div class="user">
				
					<div class="user_info">
						<div class="username">Username</div>
					</div>
				
					<form>
						<div id="postTextAreaSide" role="textbox" class="post_text" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyPress="updateLength()"></div>
						<button class="post_button" id="postButtonSide">Post</button>
						<div class="post_length" id="postLengthValueSide">1000</div>
					</form>
				</div>
				<div class="content">
				</div>
				<footer>
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
				</footer>
			</nav>
			<div class="timeline">
				<div class="timelineelement"></div>
				<div class="timelineelement timelineend"><div class="end">Nothing more to load.</div></div>
			</div>
		</div>
	</body>
</html>