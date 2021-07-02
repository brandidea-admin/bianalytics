<?php
error_reporting(0);

$uid2 = $_REQUEST;
// $uid2['usrid'] = 9;
// echo $uid2['menuid'];
$mid = $uid2['menuid'];
//exit;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biapplara";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT refid,menu_name,parent_id from menus where stat='A' AND parent_id=".$mid." ORDER BY order_fld";
$result = $conn->query($sql2);

$mids = array();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $mids[$row["refid"]] = $row["menu_name"];
  }
} else {
  $mids = array();
}

print_r(json_encode($mids));
