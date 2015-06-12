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
		<?php 
		include "header.php";
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
				<a class="title" href="index.php">lettergard</a>
				<div style="float:left;width:100px;">&nbsp;</div>
				<form class="searcharea" method="get" action="search.php">
					<input type="textbox" class="searchbar" name="search" value="<?php echo $_GET['search'];?>">
					<button class="searchbutton" type="submit"><img src="img/search.png"></button>
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
					<?php 
						
						$filename = getHash($_SESSION['id']);
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
						{ echo "<img src=\"" . $files[0] . "\" class=\"user_img\" height=\"90\" width=\"90\">\n"; }
						else
						{ echo "<img src=\"img/Avatars/default.png\" class=\"user_img\" height=\"90\" width=\"90\"> \n"; }
					?>
						<div class="username"><?php echo getNickname($_SESSION['id'])?></div>
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
						<?php
						if(isValidated($_SESSION['id'])==1)
						{
							echo htmlentities("Du hast deine Emailadresse bestätigt.\n");
						}
						else
						{
							echo htmlentities("Deine E-Mailadresse ist noch nicht bestätigt. Wir haben dir eine Aktivierungs-E-Mail zugeschickt.\n");
							echo "<div id=\"resentMail\" class=\"button\">Ich habe die E-Mail nicht bekommen. <br>Bitte schickt mir eine neue Email zu.</div>\n";
							echo "<div id=\"mailSent\" style=\"display:none;font-weight:bold;\">Wir haben dir eine E-Mail zugeschickt.</div>\n";
						}
						?>
					</div>
					<div class="settingsElement">
						<b>Deine E-Mail</b>
						<form action="" method="post" id="MailPost">
							<div class="title">E-Mail</div>
							<div name="Nickname" id="mailTextArea" role="textbox" class="textfield" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyUp="CheckNewMail('mailTextArea','updateButton')"><?php echo getMail($_SESSION['id']); ?></div>

							<button class="update_button" id="updateButton">Update</button>
						</form>
						<h6>HINWEIS: Wenn du deine E-Mailadresse &auml;nderst, musst du sie erneut best&auml;tigen.</h6>
					</div>
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
					<div class="settingsElement">
						<?php
						
						$filename = getHash($_SESSION['id']);
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
							{ echo "<img src=\"" . $files[0] . "\" height=\"90\" width=\"90\">\n"; }
						else
							{ echo "<img src=\"img/Avatars/default.png\" height=\"90\" width=\"90\"> \n"; }
						?>
						<b>Dein Avatar</b><br>
						<form action="upload_file.php" method="post" enctype="multipart/form-data">
							<label for="file">Filename:</label>
							<input type="file" name="file" id="file"><br>
							<input type="submit" name="submit" value="Upload" class="button">
							<?php
							if (count($files) == 1)
							{
							?>
							<input type="submit" name="deleteImg" value="Bild l&ouml;schen" class="button">
							<?php
							}
							?>
						</form>
					</div>
					<div class="settingsElement">
						<b>Deine Infos</b>
						<form id="infoForm" action="" method="post">
							<div class="title">Nickname</div>
							<div name="Nickname" id="Nickname" role="textbox" class="textfield" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false"><?php echo getNickname($_SESSION['id']); ?></div>
							<div class="title">Deine Website</div>
							<div name="Website" id="Website" role="textbox" class="textfield" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false"><?php echo getWebsite($_SESSION['id']); ?></div>
							
							<button class="update_button" id="updateButton" type="submit">Update</button>
						</form>
					</div>
					<div class="settingsElement">
						<b>Deine Biografie</b>
						<form id="bioForm" action="" method="post">
							<div name="Post" id="bioTextArea" role="textbox" class="bio_text" maxlength="1000" contenteditable="true" aria-multiline="true" spellcheck="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" OnKeyPress="updateBioLength()"><?php echo getBio($_SESSION['id']); ?></div>
							<div class="bio_length" id="bioLengthValue"><?php echo 1000-4-strlen(getBio($_SESSION['id'])); ?></div>
							<button class="bio_button" id="bioButton" type="submit">Update</button>
					</form>
					</div>
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
							<a <?php if(getScheme($_SESSION['id']) == 0) {echo "class=\"Activesitedesign\"";} else {echo "class=\"sitedesign\"";} ?> href="changeSettings.php?scheme=0"><img src="img/Designs/Green.png"></a>
							<a <?php if(getScheme($_SESSION['id']) == 1) {echo "class=\"Activesitedesign\"";} else {echo "class=\"sitedesign\"";} ?> href="changeSettings.php?scheme=1"><img src="img/Designs/Purple.png"></a>
							<a <?php if(getScheme($_SESSION['id']) == 2) {echo "class=\"Activesitedesign\"";} else {echo "class=\"sitedesign\"";} ?> href="changeSettings.php?scheme=2"><img src="img/Designs/Turkis.png"></a>
							<a <?php if(getScheme($_SESSION['id']) == 3) {echo "class=\"Activesitedesign\"";} else {echo "class=\"sitedesign\"";} ?> href="changeSettings.php?scheme=3"><img src="img/Designs/Rust.png"></a>
							<a <?php if(getScheme($_SESSION['id']) == 4) {echo "class=\"Activesitedesign\"";} else {echo "class=\"sitedesign\"";} ?> href="changeSettings.php?scheme=4"><img src="img/Designs/Gold.png"></a>
					</div>
					<?php
					break;
				}
			?>
			</div>
		</div>
		<div id="MailUpdated" style="display:none;">Mail geupdated.</div>
		<?php
		if(isset($_GET['SUCCESS']))
		{
			if($_GET['SUCCESS'] == 1)
			{
			echo "<div id=\"SUCCESS\">Profilbild erfolgreich geupdated.</div>";
			}
			if($_GET['SUCCESS'] == 2)
			{
			echo "<div id=\"SUCCESS\">Profilbild erfolgreich gel&ouml;scht.</div>";
			}
		}
		
		if(isset($_GET['EXISTS']))
		{
		echo "<div id=\"ERROR\">Das ist bereits dein Profilbild.</div>";
		}
		if(isset($_GET['Invalid']))
		{
		echo "<div id=\"ERROR\">Bild konnte nicht hochgeladen werden.</div>";
		}
		?>
	</body>
</html>