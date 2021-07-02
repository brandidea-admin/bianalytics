<?php
error_reporting(0);

$uid2 = $_REQUEST;
// echo $uid2['usrid'];
// echo $uid2['mids'];
// exit;

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

$sql = "UPDATE users SET menus='". substr($uid2['mids'],0,-1) . "' where id=" . $uid2['usrid'];
$result = $conn->query($sql);

$sql = "SELECT menus from users where id=" . $uid2['usrid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $mids = $row["menus"];
  }
} else {
  echo "0 results";
}

//$menids = explode(",",$mids);

// print_r($menids);
// exit;

//$mids2 = substr($mids,0,-1);


    $str3 = "";
    $sql2 = "SELECT refid,menu_name,is_child,parent_id,order_fld from menus where refid IN (" . $mids . ")";
    $result2 = $conn->query($sql2);

    // echo $sql2 . "</br></br></br>";s
    // exit;

    if ($result2->num_rows > 0) {
    // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            $str3 .= '{"refid":"'.$row2["refid"].'","menu_name":"'.$row2["menu_name"].'","is_child":"'.$row2["is_child"].'","parent_id":"'. $row2["parent_id"] .'","order_fld":"'.$row2["order_fld"].'"},';
        }
    } 
    
    $str4 .= $str3;

$conn->close();

$str5 = "[" . substr($str4,0,-1) . "]";

$fileinfo = "user-jsons/user_menu_".$uid2['usrid'].".json";

// echo $str5;
// exit;
$ff=fopen($fileinfo,'w');
fwrite($ff,$str5);
fclose($ff);
//file_put_contents($fileinfo,$str5);

?>