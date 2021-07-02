<?php
error_reporting(0);

$uid2 = $_REQUEST;
// echo $uid2['usrid'];

$source = 'user-jsons/menus_table.json'; 
  
// Store the path of destination file
$destination = 'user-jsons/user_menu_'. $uid2['usrid'] .'.json'; 
//$destination = 'user-jsons/user_menu_aaa.json'; 
  
if( !copy($source, $destination) ) { 
    echo "File can't be copied! \n"; 
} 
else { 
    echo "Template Menu has been copied! \n"; 
} 

?>