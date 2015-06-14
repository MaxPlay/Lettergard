<?php
	/** Code is poetry **/
	session_start();
	include "userApi.php";
	
	if(!isset($_SESSION['id']))
		header('Location:front.php?login=0');
	
	if(!isset($_GET['User']))
		$_SESSION['visit'] = $_SESSION['id'];
	else
	{
	if(!is_numeric($_GET['User']))
		$_SESSION['visit'] = $_GET['User'];
		else {
		$_SESSION['visit'] = $_SESSION['id'];
		header('Location:noUser.php');
		}
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>lettergard - <?php echo $_SESSION['name'];?></title>
		<?php 
		include "header.php";
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/addition.css\">\n";
		?>
		<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/angular.min.js"></script>
		<script src="js/base.js"></script>
		<script src="js/jQueryStuff.js"></script>
		<script src="js/jQueryRefresh.js"></script>
		<?php
		
	if(isset($_GET['val'])) {
		validate($_GET['val']);
		
		print "<script>";
print "$(document).ready(function() {";
			print "$(\"#Validated\").fadeIn(\"fast\").delay(2000).fadeOut();";
print "});";
print "</script>";

	}
		?>
	</head>
	<body>
		<header>
			<div class="content">
				<div style="float:left;width:50px;">&nbsp;</div>
				<a class="title" href="index.php">lettergard</a>
				<div style="float:left;width:100px;">&nbsp;</div>
				<form class="searcharea" method="get" action="search.php">
					<input type="textbox" class="searchbar" name="search" value="<?php echo $_GET['search'];?>" placeholder="lettergard durchsuchen">
					<button class="searchbutton" type="submit"><img src="img/search.png"></button>
				</form>
				<div style="float:left;width:100px;">&nbsp;</div>
				<div class="menu"><img src="img/menu.png">
					<form class="menuVolume" style="display:none;">
						<div class="firstelement"></div>
						<a class="menuelement" href="">Profil</a>
						<a class="menuelement" href="settings.php">Einstellungen</a>
						<a class="menuelement" href="">Hilfe</a>
						<a class="menuelement" href="logout.php">Logout</a>
						<div class="finalelement"></div>
					</form>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<nav>
				<div class="user">
					
					<div class="user_info">
					<?php 
						
						$filename = getHash($_SESSION['visit']);
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
						{ echo "<img src=\"" . $files[0] . "\" class=\"user_img\" height=\"90\" width=\"90\">\n"; }
						else
						{ echo "<img src=\"img/Avatars/default.png\" class=\"user_img\" height=\"90\" width=\"90\"> \n"; }
					?>
						<div class="username"><?php echo getNickname($_SESSION['visit'])?></div>
					</div>
				
					<form id="postForm" method="post">
						<div name="Post" id="postTextAreaSide" role="textbox" class="post_text" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyPress="updateLength()"></div>
						<button class="post_button" id="postButtonSide">Post</button>
						<div class="post_length" id="postLengthValueSide">1000</div>
					</form>
				</div>
				<div class="content">
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowerCount"></div>
						</div>
						<div class="elementheader">&nbsp;<a href="showFollower.php">Follower</a></div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowedCount"></div>
						</div>
						<div class="elementheader">&nbsp;<a href="showFollowings.php">Leuten denen Du folgst</a></div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="PostCount"></div>
						</div>
						<div class="elementheader">&nbsp;Anzahl deiner Posts</div>
					</div>
				</div>
				<footer>
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
				</footer>
			</nav>
			<div class="timeline" id="searchOutput">
				
				<!--<div class="timelineelement timelineend"><div class="end">Nothing more to load.</div></div>-->
			</div>
		</div>
		<div id="SentError" style="display:none;">Nachricht konnte nicht versendet werden.</div>
		<div id="Validated" style="display:none;">Du hast deine E-Mailadresse best&auml;tigt.</div>
		<?php echo "<script>searchResults(\"" . $_GET['search'] . "\")</script>";?>
	</body>
</html>