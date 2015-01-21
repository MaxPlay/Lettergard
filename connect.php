<?php			
					$verbindung = mysql_connect("localhost","root","")
					or die("Verbindung zur Datenbank konnte nicht hergestellt werden.");
		
					mysql_select_db("lettergard") or die("Datenbank konnte nicht ausgewählt werden");
?>			