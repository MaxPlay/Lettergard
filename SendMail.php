<?php
session_start();

if(isset($_SESSION['id'])) {
	
	include 'connect.php';
	
	$id = $_SESSION['id'];
	
	$sql = "SELECT `userValidated`,`userID`,`userName`,`userMail`,`userHash` FROM `user` WHERE `userID` = $id";
	
	$result = mysqli_fetch_object(mysqli_query($conn,$sql));
	
	if($result->userValidated == 0) {
	
	$name = $result->userName;
	
	$link = "https://localhost/Projectarbeit_Twitterklon/index.php?val=" . $result->userHash;
print "test";
	
$mailtext = "<html>
<head>
    <title>E-Mail Verifizierung - lettergard.com</title>
	<style>
		html, body {
	background-repeat:repeat-x;
	background-image:url(\"../img/bg.png\");
	background-color:#AAAAAA;
	margin:0 auto;
	width:850px;
	height:100%;
}

header { 
	width:850px;
	position:relative;
	top:0px;
	margin:0 auto;
	z-index:2;
}

header .content {
	position:fixed;
	display:block;
	background: linear-gradient(#33cc33 5%, #009900, #003300);
	float:left;
	width:848px;
	height:50px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
	border-left:1px solid #999999;
	border-right:1px solid #999999;
}

header .content .title {
	color:white;
	font-family:\"Lucida Console\";
	font-size:24px;
	top:10px;
	margin:10px;
	float:left;
	text-decoration:none;
}

#wrapper {
	margin:0 auto;
	width:850px;
	padding-top:60px;
	height:calc(100% - 70px);
}
.frontcontent {
	position:relative;
	clear:both;
	padding:30px;
	border-radius:10px;
	min-height:600px;
	width:783px;
	background:#dddddd;
	margin-bottom:50px;
}

.Mail {
	margin:100px;
	background:#ffffff;
	padding:30px;
	border-radius:10px;
}
	</style>
</head>
 
<body>
 <header>
	<div class=\"content\">
		<div style=\"float:left;width:50px;\">&nbsp;</div>
		<span class=\"title\">lettergard</span>
	</div>
 </header>
 <div id=\"wrapper\">
			<div class=\"frontcontent\">
				<span style=\"font-family:sans-serif;font-size:24px;\">Willkommen auf </span><span style=\"font-family:'Lucida Console';font-size:40px;\">lettergard</span>
				<div class=\"Mail\">
				<p>Hallo $name,</p>
				<p>Danke, dass du ein Teil der <span style=\"font-family:'Lucida Console';\">lettergard</span>-Community sein m&ouml;chtest.</p>
				<p>Bevor du <span style=\"font-family:'Lucida Console';\">lettergard</span> jedoch vollst&auml;ndig nutzen kannst, musst du zuerst noch deine E-Mailadresse best&auml;tigen.</p>
				<p>Klicke hierzu bitte auf diesen Link:<br><a href=\"$link\">$link</a></p>
				<p>Wir w&uuml;nschen dir viel Spa&szlig; auf <span style=\"font-family:'Lucida Console';\">lettergard</span>.</p>
				<br>
				<p>Dein <span style=\"font-family:'Lucida Console';\">lettergard</span> Team</p>
				</div>
			</div>
		</div>
</body>
</html>
";

$empfaenger = "maxplayyt@gmail.com";//$result->userMail; //Mailadresse
$absender   = "noreply@lettergard.com";
$betreff    = "E-Mail Verifizierung - lettergard.com";
 
$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n\r\n";
 
$header .= "From: $absender\r\n";
// $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
$header .= "X-Mailer: PHP ". phpversion();
 
mail( $empfaenger,
      $betreff,
      base64_encode($mailtext),
      $header);

	  }

}
	header("location:settings.php?id=0&mail=1");
?>