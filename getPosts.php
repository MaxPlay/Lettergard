<?php
first = $_GET["first"];
last = $_GET["last"];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect.php';

$sql = "SELECT  FROM posts, user WHERE postUser = userID";

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"UserName":"'  . $rs["userName"] . '",';
    $outp .= '"Nickname":"'  . $rs["userNick"] . '",';
    $outp .= '"PostText":"'   . $rs["postText"] . '",';
    $outp .= '"PostTime":"'. $rs["postTime"] . '"}';
}
$outp .="]";

echo($outp);
?> 