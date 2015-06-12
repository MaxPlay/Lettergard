<?php
session_start();

include 'connect.php';
include_once 'userApi.php';
include_once 'lib.php';
	
if(isset($_GET['start']))
	$start = $_GET['start'];

	if($start == "undefined")
	$start = GetHighestPostID()+1;
	
if($_SESSION['visit'] == $_SESSION['id'])
{
		$sql = "SELECT
		`u`.`userName` AS `PostName`,
		`u`.`userNickname` AS `Nick`,
		`p`.`postText` AS `Text`,
		`p`.`postTime` AS `Time`,
		`p`.`postID` AS `ID`
		FROM `posts` AS `p`
		JOIN `user` AS `u` ON `u`.`userID` = `p`.`postUser`
		WHERE `p`.`postID` < '" . $start . "' AND (`p`.`postID` IN
		(	SELECT `reblog`.`reblogPost`
			FROM `reblog`, `follow`
			WHERE `reblog`.`reblogUser` IN
			(	SELECT `follow`.`followUser`
				FROM `follow`
				WHERE `follow`.`followFollower` = " . $_SESSION['id'] . "
			)
		)
		OR
		`p`.`postUser` IN
		(	SELECT `follow`.`followUser`
			FROM `follow`
			WHERE `follow`.`followFollower` = " . $_SESSION['id'] . "
		)
		OR
		`p`.`postUser` = " . $_SESSION['id'] . ")
		ORDER BY `ID` DESC
		LIMIT 15";
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
		WHERE `p`.`postID` < '" . $start . "' AND (`p`.`postID` IN
			(	
			SELECT `reblog`.`reblogPost`
			FROM `reblog`
			WHERE `reblog`.`reblogUser` = " . $_SESSION['visit'] . "
			)
			OR
			`p`.`postUser` = " . $_SESSION['visit'] . ")
		ORDER BY `ID` DESC
		LIMIT 15";
}
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
	
	echo "<div class=\"timelineelement\" id=\"";
		echo $obj->ID;
		echo "\">";
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
?> 