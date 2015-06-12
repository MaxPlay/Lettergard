<?php
	/** Code is poetry **/
	session_start();
	include_once "userApi.php";
	
	if(!isset($_SESSION['id']))
		header('Location:front.php?login=0');
	
	if(!isset($_GET['User']))
		$_SESSION['visit'] = $_SESSION['id'];
	else
	{
	if(DoesUserExist($_GET['User']))
		$_SESSION['visit'] = GetUserIDbyName($_GET['User']);
	else
		header('Location:noUser.php');
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
					<input type="textbox" class="searchbar" name="search">
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
				<?php if($_SESSION['visit'] == $_SESSION['id']) {
					?>
				<div class="content">
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowerCount"></div>
						</div>
						<div class="elementheader"><a href="showFollower.php">&nbsp;Follower</a></div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowedCount"></div>
						</div>
						<div class="elementheader"><a href="showFollowings.php">&nbsp;Leuten denen Du folgst</a></div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="PostCount"></div>
						</div>
						<div class="elementheader">&nbsp;Anzahl deiner Posts</div>
					</div>
				</div>
				<?php
				}
				else
				{
					?>
					<div id="followButton"><?php if(folgstDu()==1) echo getNickname($_SESSION['visit'])."&nbsp;entfolgen"; else echo getNickname($_SESSION['visit'])."&nbsp;folgen";?></div>
					<?php if(folgtDir() == 1) {
						echo getNickname("<div class=\"followsYou\">".$_SESSION['visit'])."&nbsp;folgt Dir.</div>";
					}?>
				<div class="content">
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowerCount"></div>
						</div>
						<div class="elementheader">&nbsp;Leute die <?php echo getNickname($_SESSION['visit']); ?> folgen</div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="FollowedCount"></div>
						</div>
						<div class="elementheader">&nbsp;Leuten denen <?php echo getNickname($_SESSION['visit']); ?> folgt</div>
					</div>
					<div class="contentelement">
						<div class="elementcontent">
							<div class="PostCount"></div>
						</div>
						<div class="elementheader">&nbsp;Anzahl von <?php
							if(substr(getNickname($_SESSION['visit']), -1) == 'x' || substr(getNickname($_SESSION['visit']), -1) == 's')
								echo getNickname($_SESSION['visit'])."'";
							else
								echo getNickname($_SESSION['visit'])."s";
						?> Posts</div>
					</div>
				</div>
				<?php }?>
				<footer>
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
				</footer>
			</nav>
			<div class="timeline appendable">
				<!-- TEMPLATE -->
				<!--<div class="timelineelement">
					<a class="PostHeader"><img src="img/Avatars/$filename" height="20"><div class="PostAuthor">Header</div><div class="PostAdress">@Header</div></a>
					<div class="PostContent">Content</div>
				</div>-->
				<div class="timelineelement timelineend"><div class="end">Nothing more to load.</div></div>
			</div>
		</div>
		<div id="SentError" style="display:none;">Nachricht konnte nicht versendet werden.</div>
		<div id="Validated" style="display:none;">Du hast deine E-Mailadresse best&auml;tigt.</div>
		<?php echo "<script>loadMessages();</script>";?>
	</body>
</html>