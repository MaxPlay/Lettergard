<?php
switch(getScheme($_SESSION['id']))
{
	case 0:
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/base_green.css\">\n";
		break;
	case 1:
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/base_purple.css\">\n";
		break;
	case 2:
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/base_turkis.css\">\n";
		break;
	case 3:
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/base_rust.css\">\n";
		break;
	case 4:
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/base_gold.css\">\n";
		break;
}
?>