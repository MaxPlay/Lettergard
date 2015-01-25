<?php
/** Code is poetry **/

/**
 * Returns the number of followers for the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for follow.
 **/
function getFollowerCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `follow` WHERE `followFollower` = $id";
	
	return mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
}

/**
 * Returns the number of followed users for the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for follower.
 **/
function getFollowedCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `follow` WHERE `followFollow` = $id";
	
	return mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
}

/**
 * Returns the number of post from the user with the given id.
 * $id = The id of the searched user.
 * $return = number of entrys in the database for posts.
 **/
function getPostCount($id) {
	include 'connect.php';
	
	$sql = "SELECT * FROM `posts` WHERE `postUser` = $id";
	
	return mysqli_num_rows(mysqli_query($conn, $sql));
	
	mysqli_close($conn);
}
?>