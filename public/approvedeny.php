<!DOCTYPE html5>
<html>
  <head>
    <title>Tree Multiselect test</title>

    <meta charset="UTF-8">

    <style>
      * {
        font-family: sans-serif;
      }
    </style>
    <link rel="stylesheet" href="tree-menu/jquery.tree-multiselect.min.css">

    <script src="tree-menu/jquery-1.11.3.min.js"></script>
    <script src="tree-menu/jquery-ui.min.js"></script>
    <script src="tree-menu/jquery.tree-multiselect.js"></script>
  </head>

  <body>

    <select id="test-select" multiple="multiple">

<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "biapplara";

  // // Create connection
  $conn = new mysqli($host, $user, $pass, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


$prtid = $_REQUEST['mid'];
//$prtid = 271242;

echo getChildren($conn, $prtid);

?>

    </select>

     <script type="text/javascript">
      var tree1 = $("#test-select").treeMultiselect({ enableSelectAll: true, sortable: true, searchable: true });
      $(".section").addClass('collapsed');
    </script>

  </body>
</html>


<?php

function getChildren($conn, $id, $qry6="")
{

  $sql2 = "SELECT refid, menu_name  FROM `167_menu` WHERE `refid` = ". $id ." AND `stat` = 'A'";
  $result2 = $conn->query($sql2);
  while($row2 = $result2->fetch_assoc()) {
    $menu_head = addslashes($row2["menu_name"]);
  }


  $sql = "SELECT refid, menu_name, is_child, parent_id  FROM `167_menu` WHERE `parent_id` = ". $id ." AND `stat` = 'A'";
  //echo $sql; 
  //exit;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $menu_id = $row["refid"];
      $menu_name = addslashes($row["menu_name"]);

        $qry6 .= '<option value="' . $menu_id . '" data-section="'.$menu_head.'">' . $menu_name . '</option>';

        $qry6 .= getChildren($conn, $menu_id);

    }

   return $qry6;
}

?>