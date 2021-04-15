<?php
$ak = array('label' => 'Alaska');
$al = array('label' => 'Alabama');
$ar = array('label' => 'Arkansas');

$arr[0] = $ak;
$arr[1] = $al;
$arr[2] = $ar;

# echo the json data back to the html web page
echo json_encode($arr);
?>