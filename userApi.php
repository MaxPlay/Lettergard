<?php
/** Code is poetry **/

/**
 * Returns the number of followers for the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for follow.
 **/
function getFollowerCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `follow` WHERE `followFollower` = '$id'";
	
	$ret = mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Returns the number of followed users for the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for follower.
 **/
function getFollowedCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `follow` WHERE `followFollow` = '$id'";
	
	$ret = mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Returns the number of post from the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for posts.
 **/
function getPostCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `posts` WHERE `postUser` = $id";
	
	$ret = mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Sets the scheme of the website.
 * $id = The id of the scheme
 * $User = The User-ID
 **/
function setScheme($id, $User) {
	include 'connect.php';
	
	$sql = "UPDATE `settings` SET `settingsDesign` = $id WHERE `settingsUser` = $User";
	mysqli_query($conn, $sql);
	
	mysqli_close($conn);
}


/**
 * Gets the scheme of the website.
 * $User = The User-ID
 * return = the id of the active scheme
 **/
function getScheme($User) {
	include 'connect.php';
	
	$sql = "SELECT `settingsUser` , `settingsDesign` FROM `settings` WHERE `settingsUser` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->settingsDesign;
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Checks wether an Email is verified or not.
 * $User = The User-ID
 * return = 1 if Email is verified
 **/
function isValidated($User) {
	include 'connect.php';
	
	$sql = "SELECT `userID`,`userValidated` FROM `user` WHERE `userID` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->userValidated;
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Checks wether a Username is taken.
 * $User = The UserName
 * return = 0 if UserName is free
 **/
function DoesUserExist($User) {
	include 'connect.php';
	
	$sql = "SELECT `userName` FROM `user` WHERE `userName` = '$User'";
	
	$ret = mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Generates a random string with a given length
 * $length = The length of the returning string. Default is 10
 * return = returns a string of random characters in a given length
 *
 * Thanks to Captain Lightning and Stephen Watkins from StackOverlfow for providing that Codesnippet!
 **/
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Gets the Bio for the given user
 * $User = The UserName
 * return = returns the full text of the bio
 **/
function getBio($User)
{
	include 'connect.php';
	
	$sql = "SELECT `userID`,`userBio` FROM `user` WHERE `userID` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->userBio;
	
	mysqli_close($conn);
	
	return $ret;
}


/**
 * Gets the Nick for the given user
 * $User = The UserName
 * return = returns the nickname
 **/
function getNickname($User)
{
	include 'connect.php';
	
	$sql = "SELECT `userID`,`userNickname` FROM `user` WHERE `userID` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->userNickname;
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Gets the Website for the given user
 * $User = The UserName
 * return = returns the domain
 **/
function getWebsite($User)
{
	include 'connect.php';
	
	$sql = "SELECT `userID`,`userWebsite` FROM `user` WHERE `userID` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->userWebsite;
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Gets the Mail of the given user
 * $User = The UserName
 * return = returns the mail
 **/
function getMail($User)
{
	include 'connect.php';
	
	$sql = "SELECT `userID`,`userMail` FROM `user` WHERE `userID` = $User";
	
	$ret = mysqli_fetch_object(mysqli_query($conn, $sql))->userMail;
	
	mysqli_close($conn);
	
	return $ret;
}

/**
 * Validates the User
 * $User = The UserName
 **/
function validate($hash)
{
	include 'connect.php';
	$User = $_SESSION['id'];
	
	$sql = "SELECT `userID`,`userHash` FROM `user` WHERE `userID` = $User";
	
	$userHash = mysqli_fetch_object(mysqli_query($conn, $sql))->userHash;
	
	if($hash == $userHash)
	{
	$sql = "UPDATE `lettergard`.`user` SET `userValidated` = '1' WHERE `user`.`userID` = $User;";
		
	mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
}
?>