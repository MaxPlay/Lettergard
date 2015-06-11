<?php
session_start();

include 'connect.php';
include_once 'UserApi.php';
include_once 'lib.php';

if($_GET['type'] == "user")
{
	$sql = "SELECT `user`.`userName` AS `Name`, `user`.`userNickname` AS `Nick` FROM `user` WHERE `userName` LIKE '" . str_replace("@","",$_GET['search']) . "' OR `userNickname` LIKE '" . str_replace("@","",$_GET['search']) . "'";
	
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
	
	echo "<div class=\"timelineelement\">";
		echo "<a class=\"searchresult\" href=\"index.php?User=";
		echo $obj->Name;
		echo "\"><table><tr><td><img src=\"$filename\" height=\"40\" width=\"40\"></td><th>";
		echo $obj->Nick;
		echo "</th><td>&nbsp;@";
		echo $obj->Name;
		echo "</td></a>";
		if(getUserIDbyName($obj->Name) == $_SESSION['id'])
			echo "<td> (Das bist du!)</td>";
	echo "</div>";
	}
	mysqli_close($conn);
}
else
{
	$sql = "SELECT
		`u`.`userName` AS `PostName`,
		`u`.`userNickname` AS `Nick`,
		`p`.`postText` AS `Text`,
		`p`.`postTime` AS `Time`,
		`p`.`postID` AS `ID`
		FROM `posts` AS `p`
		JOIN `user` AS `u` ON `u`.`userID` = `p`.`postUser`
		WHERE
		`u`.`userName` LIKE '" . str_replace("@","",$_GET['search']) . "'
		OR
		`u`.`userNickname` LIKE '" . $_GET['search'] . "'
		OR
		`p`.`postText` LIKE '%" . $_GET['search'] . "%'
		ORDER BY `ID` DESC";

	$result = mysqli_query($conn, $sql);
	
	if(!is_bool($result))
	while($obj = mysqli_fetch_object($result))
	{
	$filename = getHash(getUserIDbyName($obj->PostName));
						
						$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
						if (count($files) == 1)
						{ $filename= $files[0]; }
						else
						{ $filename ="img/Avatars/default.png"; }
	
	echo "<div class=\"timelineelement\">";
		echo "<a class=\"PostHeader\" href=\"index.php?User=";
		echo $obj->PostName;
		echo "\"><img src=\"$filename\" height=\"20\" width=\"20\"><div class=\"PostAuthor\">";
		echo $obj->Nick;
		echo "</div><div class=\"PostAdress\">@";
		echo $obj->PostName;
		echo "</div>";
		echo "<div class=\"PostTime\">";
		echo $obj->Time;
		echo "</div></a>";
		echo "<div class=\"PostContent\">";
		echo encodePost($obj->Text);
		echo "</div>";
	echo "</div>";
	}
	mysqli_close($conn);
}
?> 