<?php			
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}

$conn = new mysqli("localhost","root","", "lettergard");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>			