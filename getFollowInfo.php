<?php
session_start();

include 'connect.php';
include_once 'userApi.php';
include_once 'lib.php';

$id = $_SESSION['id'];
if(isset($_GET['start']))
	$start = $_GET['start'];

	if($start == "undefined")
	$start = GetHighestFollowID()+1;

if($_GET['type'] == "follower")
{
	$sql = "SELECT `user`.`userName` AS `Name`, `user`.`userNickname` AS `Nick`, `follow`.`followID` AS `ID` FROM `user` JOIN `follow` ON `user`.`userID` = `follow`.`followFollower` WHERE `follow`.`followUser` = '$id' AND `follow`.`followID` < $start ORDER BY `followID` LIMIT 15";
	
	$result = mysqli_query($conn, $sql);
	
	if(!is_bool($result))
	
	while($obj = mysqli_fetch_object($result))
	{
	$filename = getHash(getUserIDbyName($obj->Name));
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
						{ $filename= $files[0]; }
						else
						{ $filename ="img/Avatars/default.png"; }
	
	echo "<div class=\"timelineelement\" id=\"";
		echo $obj->ID;
		echo "\">";
		echo "<a class=\"searchresult\" href=\"index.php?User=";
		echo $obj->Name;
		echo "\"><table><tr><td><img src=\"$filename\" height=\"40\" width=\"40\"></td><th>";
		echo $obj->Nick;
		echo "</th><td>&nbsp;@";
		echo $obj->Name;
		echo "</td></a>";
		if(getUserIDbyName($obj->Name) == $_SESSION['id'])
			echo "<td> (Das bist du!)</td>";
		echo "</tr></table></a>";
	echo "</div>";
	}
	mysqli_close($conn);
}
else
{
	$sql = "SELECT `user`.`userName` AS `Name`, `user`.`userNickname` AS `Nick`, `follow`.`followID` AS `ID` FROM `user` JOIN `follow` ON `user`.`userID` = `follow`.`followUser` WHERE `follow`.`followFollower` = '$id' AND `follow`.`followID` < $start ORDER BY `followID` LIMIT 15";
	
	$result = mysqli_query($conn, $sql);
	
	if(!is_bool($result))
	
	while($obj = mysqli_fetch_object($result))
	{
	$filename = getHash(getUserIDbyName($obj->Name));
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
						{ $filename= $files[0]; }
						else
						{ $filename ="img/Avatars/default.png"; }
	
	echo "<div class=\"timelineelement\" id=\"";
		echo $obj->ID;
		echo "\">";
		echo "<a class=\"searchresult\" href=\"index.php?User=";
		echo $obj->Name;
		echo "\"><table><tr><td><img src=\"$filename\" height=\"40\" width=\"40\"></td><th>";
		echo $obj->Nick;
		echo "</th><td>&nbsp;@";
		echo $obj->Name;
		echo "</td>";
		if(getUserIDbyName($obj->Name) == $_SESSION['id'])
			echo "<td> (Das bist du!)</td>";
		echo "</tr></table></a>";
	echo "</div>";
	}
	mysqli_close($conn);
}
?>