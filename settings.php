<?php
	/** Code is poetry **/
	session_start();
	include "userApi.php";
	
	$id=0;
	
	if(!isset($_SESSION['id']))
		header('Location:front.php?login=0');
		
	if(isset($_GET['id']))
		$id = $_GET['id'];
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		lettergard - Einstellungen - 
		<?php
		switch($id)
		{
		case 0:
			echo "Account";
			break;
		case 1:
			echo "Datenschutzeinstellungen";
			break;
		case 2:
			echo "Profil";
			break;
		case 3:
			echo "Mitteilungen";
			break;
		case 4:
			echo "Design";
			break;
		}
		?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<?php 
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/settings.css\">\n";
		?>
		<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/angular.min.js"></script>
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
						<div class="username"><?php echo $_SESSION['name']?></div>
					</div>
				
					<form>
						<div id="postTextAreaSide" role="textbox" class="post_text" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyPress="updateLength()"></div>
						<button class="post_button" id="postButtonSide">Post</button>
						<div class="post_length" id="postLengthValueSide">1000</div>
					</form>
				</div>
				<div class="content">
					<div class="contentelement">
						<?php
						if($id==0)
						{
							echo "<div class=\"elementfakelink upperElement\">";
							echo "Account";
							echo "</div>\n";
						}
						else
						{
							echo "<a class=\"elementlink upperElement\" href=\"settings.php?id=0\">";
							echo "Account";
							echo "</a>\n";
						}
						?>
					</div>
					<div class="contentelement">
						<?php
						if($id==1)
						{
							echo "<div class=\"elementfakelink\">";
							echo "Datenschutzeinstellungen";
							echo "</div>\n";
						}
						else
						{
							echo "<a class=\"elementlink\" href=\"settings.php?id=1\">";
							echo "Datenschutzeinstellungen";
							echo "</a>\n";
						}
						?>
					</div>
					<div class="contentelement">
						<?php
						if($id==2)
						{
							echo "<div class=\"elementfakelink\">";
							echo "Profil";
							echo "</div>\n";
						}
						else
						{
							echo "<a class=\"elementlink\" href=\"settings.php?id=2\">";
							echo "Profil";
							echo "</a>\n";
						}
						?>
					</div>
					<div class="contentelement">
						<?php
						if($id==3)
						{
							echo "<div class=\"elementfakelink\">";
							echo "Mitteilungen";
							echo "</div>\n";
						}
						else
						{
							echo "<a class=\"elementlink\" href=\"settings.php?id=3\">";
							echo "Mitteilungen";
							echo "</a>\n";
						}
						?>
					</div>
					<div class="contentelement">
						<?php
						if($id==4)
						{
							echo "<div class=\"elementfakelink lowerElement\">";
							echo "Design";
							echo "</div>\n";
						}
						else
						{
							echo "<a class=\"elementlink lowerElement\" href=\"settings.php?id=4\">";
							echo "Design";
							echo "</a>\n";
						}
						?>
					</div>
				</div>
				<footer>
				<a href="">AGB</a> | <a href="">Kontakt</a> | <a href="">Impressum</a>
				</footer>
			</nav>
			<div class="timeline" >
			<?php 
				
				switch($id)
				{
				case 0:
					?>
					<!-- Account -->
					<div class="settingsElement">
						<div class="deleteAccount" id="deleteAccount">Account l&ouml;schen<br>
							<div class="deleteInner" style="display:none;"><span style="color:#f00;">ACHTUNG:<br>Diesen Schritt kannst du nicht mehr r&uuml;ckg&auml;ngig machen.</span><br></br>
							<a href="deleteAccount.php?real=1">Account endg&uuml;ltig l&ouml;schen</a></div>
						</div>
					</div>
					<?php
					
					break;
				case 1:
					?>
					<!-- Datenschutzeinstellungen -->
					
					<?php
					break;
				case 2:
					?>
					<!-- Profil -->
					
					<?php
					break;
				case 3:
					?>
					<!-- Mitteilungen -->
					
					<?php
					break;
				case 4:
					?>
					<!-- Design -->
					<div class="settingsElement">
					Dir gefallen die Farben der Website nicht? Dann &auml;nder sie!
							<a class="sitedesign" href="changeSettings.php?scheme=0"><img src="img/Designs/Green.png"></a>
							<a class="sitedesign" href="changeSettings.php?scheme=1"><img src="img/Designs/Purple.png"></a>
							<a class="sitedesign" href="changeSettings.php?scheme=2"><img src="img/Designs/Turkis.png"></a>
							<a class="sitedesign" href="changeSettings.php?scheme=3"><img src="img/Designs/Rust.png"></a>
							<a class="sitedesign" href="changeSettings.php?scheme=4"><img src="img/Designs/Gold.png"></a>
					</div>
					<?php
					break;
				}
			?>
			</div>
		</div>
	</body>
</html>