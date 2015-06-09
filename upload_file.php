<?php
session_start();
include 'lib.php';
include 'userApi.php';

if(!isset($_POST['submit']))
{
	$filename = getHash($_SESSION['id']);
	$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
	
	if (count($files) == 1)
	{
		unlink($files[0]);
	}
	
	header("location:settings.php?id=2&SUCCESS=2");
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = strtolower(end($temp));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 10000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
  header("location:settings.php?ERROR=". $_FILES["file"]["error"]);
    }
  else
    {
	doLog("Upload: " . $_FILES["file"]["name"]);
	doLog("Type: " . $_FILES["file"]["type"]);
	doLog("Size: " . ($_FILES["file"]["size"] / 1024));
	doLog("Temp file: " . $_FILES["file"]["tmp_name"]);
	doLog(" ");

    if (file_exists("img/Avatars/" . $_FILES["file"]["name"]))
      {
		header("location:settings.php?id=2&EXISTS=1");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "img/Avatars/"  . $_FILES["file"]["name"]);
	  doLog("Stored in: " . "img/Avatar/"  . $_FILES["file"]["name"]);
		doLog(" ");
		

$filename = getHash($_SESSION['id']);
						
$files = glob("img/Avatars/$filename.*"); // Will find all files regardless of extension
						
if (count($files) == 1)
	unlink($files[0]);
		
	
		$path = $_FILES["file"]["name"];
		$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
	
		rename("img/Avatars/"  . $_FILES["file"]["name"],"img/Avatars/" . getHash($_SESSION['id']) . "." . $ext);
		header("location:settings.php?id=2&SUCCESS=1");
      }
    }
  }
else
  {
	doLog("Invalid File");
	header("location:settings.php?id=2&Invalid=1");
  }
?> 