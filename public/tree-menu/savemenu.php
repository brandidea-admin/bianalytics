<?php
error_reporting(0);

// echo "<pre>";
// print_r($_REQUEST);
// exit;

$uid2 = $_REQUEST;

$dbinfo = $uid2['dbinfo'];
list($host, $dbname, $username, $password) = explode('~~~', $dbinfo);

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "biapplara";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$mids = "";
foreach($uid2['mids'] as $mmm){
  $mids .= $mmm['refids'] . ",";
}

$sql = "UPDATE users SET menus='". substr($mids,0,-1) . "' where id=" . $uid2['usrid'];
// echo $sql;
// exit;
$result = $conn->query($sql);

echo "Menu ID Updated Successfully";
?>