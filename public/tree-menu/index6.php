<?php
error_reporting(0);

$uid2 = $_REQUEST['usrid'];
list($uid, $ufname, $ulname, $utype) = explode('~~~', $uid2);

$dbinfo = $_REQUEST['dbinfo'];
list($host, $dbname, $username, $password) = explode('~~~', $dbinfo);
//echo $uid . $ufname .  $ulname . $utype;

$menu2 = file_get_contents("menus_table.json");

$usrjson = json_decode($menu2, true);

// echo "<pre>";
// print_r($usrjson);  
// exit;

$k1 = 0;
            foreach($usrjson as $array2) {
              if( $array2['parent_id']==0 ) {
                
                $main[$array2['parent_id']] [$k1]  = $array2['refid'] . "~~~" .$array2['menu_name'] . "~~~" .$array2['parent_id'];
                $k1++;

                $k2 = 0;
                  foreach($usrjson as $array3) {
                    if($array3['parent_id']==$array2['refid']){
                      
                      $main[$array3['parent_id']] [$k2]  = $array3['refid'] . "~~~" .$array3['menu_name'] . "~~~" .$array3['parent_id'];
                      $k2++;
                      
                          $k3=0;
                          foreach($usrjson as $array4) {
                            if($array4['parent_id']==$array3['refid']){
                              
                              $main[$array4['parent_id']] [$k3]  = $array4['refid'] . "~~~" .$array4['menu_name'] . "~~~" .$array4['parent_id'];
                              $k3++;
                              
                                  $k4 = 0;
                                  foreach($usrjson as $array5) {
                                    if($array5['parent_id']==$array4['refid']){

                                      $main[$array5['parent_id']] [$k4]  = $array5['refid'] . "~~~" .$array5['menu_name'] . "~~~" .$array5['parent_id'];
                                      $k4++;
                                      
                                            $k5 = 0;
                                            foreach($usrjson as $array6) {
                                              if($array6['parent_id']==$array5['refid']){

                                                $main[$array6['parent_id']] [$k5]  = $array6['refid'] . "~~~" .$array6['menu_name'] . "~~~" .$array6['parent_id'];
                                                $k5++;
                                                
                                                    $k6=0;
                                                    foreach($usrjson as $array7) {
                                                      if($array7['parent_id']==$array6['refid']){

                                                        $main[$array7['parent_id']] [$k6]  = $array7['refid'] . "~~~" .$array7['menu_name'] . "~~~" .$array7['parent_id'];
                                                        $k6++;
                                                        
                                                            $k7=0;
                                                            foreach($usrjson as $array8) {
                                                              if($array8['parent_id']==$array7['refid']){

                                                                $main[$array8['parent_id']] [$k7]  = $array8['refid'] . "~~~" .$array8['menu_name'] . "~~~" .$array8['parent_id'];
                                                                $k7++;
                                                              } else {
                                                                continue;
                                                              }
                                                            }

                                                      } else {
                                                        continue;
                                                      }
                                                    }


                                              } else {
                                                continue;
                                              }
                                            }


                                    } else {
                                      continue;
                                    }
                                  }

                            } else {
                              continue;
                            }
                          }

                    } else {
                        continue;
                    }
                  }


              } else {
                continue;
              }
          }

// unset($temp1[259609]);
// echo "<pre>";
// print_r($main);
// exit;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery hummingbird-treeview Demo</title>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- <link href="https://bootswatch.com/cosmo/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="./tree-menu/hummingbird-treeview.css" rel="stylesheet" type="text/css">
<style>
body { background-color:#fafafa;}
.stylish-input-group .input-group-addon{
    background: white !important;
}
.stylish-input-group .form-control{
    //border-right:0;
    box-shadow:0 0 0;
    border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}

.h-scroll {
    background-color: #fcfdfd;
    height: 260px;
    overflow-y: scroll;
}
</style>
</head>

<body>


<?php

// $host     = "localhost";
// $username = "root";
// $password = "";
// $dbname   = "biapplara";

// echo $host . " <<== " . $dbname . " <<== " . $username  . " <<== " . $password;
// exit;

$conn = mysqli_connect($host, $username, $password) or die(mysqli_error());
$aaa = mysqli_select_db($conn, $dbname) or die(mysqli_error());

// // $conn = mysqli_connect($host, $username, $password);
// // $con  = mysqli_select_db($conn, $dbname);

$qry  = "SELECT menus FROM users where id=".$uid." AND status='Active'";
$res = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($res);
$usrmenu = explode(",",$row['menus']);

// echo "<pre>";
// print_r($usrmenu);
// exit;
?>

<div id='loader' style='text-align: center; display: none;'>
    <img src="Hourglass.gif" width='32px' height='32px'>
</div>

<table>
  <tr>
      <td width="10px">
      </td>
      <td width="200px">
          <h6><?php echo $ufname . " " . $ulname. " (" . $uid . ") - " .$utype;?></h5>
      </td>
      <td width="30px"></td>
      <td width="200px">
            <button class="btn btn-primary"  id="collapseAll">
              <i class="fa fa-sort-amount-down" title="Collapse All Menu"></i>
            </button>
            <button class="btn btn-primary" id="expandAll">
              <i class="fa fa-sort-amount-up" title="Expand All Menu"></i>
            </button>
            <button class="btn btn-primary" id="checkAll">
              <i class="fa fa-thumbs-up" title="Check All Menu"></i>
            </button>
            <button class="btn btn-primary" id="uncheckAll">
                <i class="fa fa-thumbs-down" title="UnCheck All Menu"></i>
            </button>
            <button class="btn btn-primary" id="updatemenu" alt="<?php echo $uid; ?>">
                <i class="fa fa-reorder" title="Update Menu"></i>
            </button>
            <button class="btn btn-primary" id="savemenu" alt="<?php echo $uid; ?>">
                <i class="fa fa-save" title="Save Menu"></i>
            </button>
            <button class="btn btn-primary" id="copy-template" alt="<?php echo $uid; ?>">
                <i class="fa fa-copy" title="Copy Template from User"></i>
            </button>
      </td>
  </tr>
</table>

<div class="container">

<div id="treeview_container" class="hummingbird-treeview well h-scroll-large" style="overflow:scroll; height:500px; margin-top: 20px;">

<ul id="treeview" class="hummingbird-base">

<?php

foreach($main[0] as $arr) {

  $mid2 = explode("~~~", $arr);  
  echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid2[0] . '" data-id="' . $mid2[0] . '" type="checkbox"> ' . $mid2[1] . '</label>';

    echo "<ul>";

    foreach($main[$mid2[0]] as $array3) {
      $mid3 = explode("~~~", $array3);
      echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid3[0] . '" data-id="' . $mid3[0] . '" type="checkbox"> ' . $mid3[1] . '</label>';

      echo "<ul>";

        foreach($main[$mid3[0]] as $array4) {
          $mid4 = explode("~~~", $array4);
          echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid4[0] . '" data-id="' . $mid4[0] . '" type="checkbox"> ' . $mid4[1] . '</label>';

          echo "<ul>";


          foreach($main[$mid4[0]] as $array5) {
            $mid5 = explode("~~~", $array5);
              echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid5[0] . '" data-id="' . $mid5[0] . '" type="checkbox"> ' . $mid5[1] . '</label>';

              echo "<ul>";

              foreach($main[$mid5[0]] as $array6) {
                $mid6 = explode("~~~", $array6);
                  echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid6[0] . '" data-id="' . $mid6[0] . '" type="checkbox"> ' . $mid6[1] . '</label>';

                  echo "<ul>";

                    foreach($main[$mid6[0]] as $array7) {
                      $mid7 = explode("~~~", $array7);
                          echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid7[0] . '" data-id="' . $mid7[0] . '" type="checkbox"> ' . $mid7[1] . '</label>';

                          echo "<ul>";

                          foreach($main[$mid7[0]] as $array8) {
                            $mid8 = explode("~~~", $array8);
                                  echo '<li><i class="fa fa-plus"></i> <label> <input id="' . $mid8[0] . '" data-id="' . $mid8[0] . '" type="checkbox"> ' . $mid8[1] . '</label>';
                          }

                          echo "</li></ul>";

                    }

                        echo "</li></ul>";
                }

                echo "</li></ul>";
          }
            
            echo "</li></ul>";

        }

        echo "</li></ul>";

    }

    echo "</li></ul>";

}

echo "</li></ul>";

?>

      </div>

</div>

<script src="./tree-menu/hummingbird-treeview.js"></script>

<script>
$("#treeview").hummingbird();

$( "#checkAll" ).click(function() {
  $("#treeview").hummingbird("checkAll");
});

$( "#uncheckAll" ).click(function() {
  $("#treeview").hummingbird("uncheckAll");
});

$( "#uncheckAll" ).click(function() {
  $("#treeview").hummingbird("uncheckAll");
});

$( "#collapseAll" ).click(function() {
  $("#treeview").hummingbird("collapseAll");
});

$( "#expandAll" ).click(function() {
  $("#treeview").hummingbird("expandAll");
});


// $( "#checkNode" ).click(function() {
//   $("#treeview").hummingbird("getChecked",{list:List,onlyEndNodes:true,onlyParents:false,fromThis:false});
//   // $("#treeview").hummingbird("checkNode",{attr:"id", name:["refid-1","refid-5125"],expandParents:false});
// });
</script>

<script type="text/javascript">


var lmods = <?php echo json_encode($usrmenu); ?>;
//console.log(lmods);
for(var i = 0; i < lmods.length; i++){
    //$("#treeview").hummingbird("checkNode",{attr:"id", name:lmods[i]});
    $("#"+lmods[i]).prop('checked', true);
    var ccc = $("#" + lmods[i]).prop('checked');
    console.log(ccc);
    if (ccc)
    $("#"+lmods[i]).parents('ul').siblings('label').children(':checkbox').prop('checked',ccc);
}

$("#updatemenu").click(function()
{
    var uid = $(this).attr("alt");  
    
    var dbinfo = '<?php echo $dbinfo; ?>'
    
    var selection = [];

        $("input[type=checkbox]:checked:enabled").each( function(){
          selection.push({
            "refids"  : $(this).attr("id")
          })
        })

        //$("#results").html(JSON.stringify(selection));

        console.log(selection);

        $.ajax({
                type: 'POST',
                data: {usrid: uid, mids: selection, dbinfo: dbinfo},
                url: "./tree-menu/savemenu.php",
                async: false,
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                    console.log(data);
                    alert("Menu IDs Saved or Updated successfully !!!");
                }
          });

      location.reload();
      //alert("Yesssssssssssss");
     
      var lmods = <?php echo json_encode($usrmenu); ?>;
      console.log(lmods);
      for(var i = 0; i < lmods.length; i++){
          //$("#treeview").hummingbird("checkNode",{attr:"id", name:lmods[i]});
          $("#"+lmods[i]).prop('checked', true);
          var ccc = $("#" + lmods[i]).prop('checked');
          console.log(ccc);
          if (ccc)
          $("#"+lmods[i]).parents('ul').siblings('label').children(':checkbox').prop('checked',ccc);
      }
      return false;
});

$("#savemenu").click(function(e){

  var x = confirm("Are you sure to Save or Update menus and modules - If yes already existing menu settings will be re-created !!!");
      if(x == true) {
        var uid = $(this).attr("alt");
        //alert(uid+" User id ...");

        var dbinfo = '<?php echo $dbinfo; ?>'


        var selection = [];

        $("input[type=checkbox]:checked:enabled").each( function(){
          selection.push({
            "refids"  : $(this).attr("id")
          })
        })

        //$("#results").html(JSON.stringify(selection));

        console.log(selection);

        $.ajax({
                type: 'POST',
                data: {usrid: uid, mids: selection, dbinfo: dbinfo},
                url: "./tree-menu/savemenu.php",
                async: false,
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                    console.log(data);
                    alert("Menu IDs Saved or Updated successfully !!!");
                }
          });


      } else {
        return false;
      }
  
});

</script>
</body>
</html>
