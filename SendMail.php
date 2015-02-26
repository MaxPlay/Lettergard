<?php
session_start();
if(isset($_SESSION['id'])) {
	
	$id = $_SESSION['id'];
	
	$sql = "SELECT `userValidated`,`userID`,`userName`,`userMail` FROM `user` WHERE `userID` = $id"
	
	$result = mysql_query($sql);
	
$mailtext = '<html>
<head>
    <title>E-Mail Verifizierung - lettergard.com</title>
</head>
 
<body>
 
<h1>HTML-E-Mail mit PHP erstellen</h1>
 
<p>Diese E-Mail wurde mit PHP und HTML erstellt</p>
 
<table border="1">
  <tr>
    <td>Beschreibung</td>
    <td>Anzahl Seiten</td>
  </tr>
  <tr>
    <td>PHP lernen mit PHP-Kurs.com</td>
    <td>über 100</td>
  </tr>
</table>
 
<p>Die meisten HTML-Tags wie <b>fett</b>
und <i>kursiv</i> stehen zur
Verfügung</p>
 
</body>
</html>
';

$empfaenger = $result->userMail; //Mailadresse
$absender   = "noreply@lettergard.com";
$betreff    = "E-Mail Verifizierung - lettergard.com";
 
$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
 
$header .= "From: $absender\r\n";
// $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
$header .= "X-Mailer: PHP ". phpversion();
 
mail( $empfaenger,
      $betreff,
      $mailtext,
      $header);
}
?>