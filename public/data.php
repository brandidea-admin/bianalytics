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

// initilize all variables
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
//define index of columns
$columns = array( 
  0 =>'id',
  1 =>'location_name', 
  2 =>'icon', 
  3 => 'stat'  
);
$where = $sqlTot = $sqlRec = "";
// getting total number records from table without any search
$sql = "SELECT * FROM `countries` ";
$sqlTot .= $sql;
$sqlRec .= $sql;
$sqlRec .=  " ORDER BY location_name";
$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));
$totalRecords = mysqli_num_rows($queryTot);
$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");
// iterate on results row and create new index array of data
while( $row = mysqli_fetch_row($queryRecords) ) { 
  $data[] = $row;
} 
$json_data = array(
    "draw"            => 1,   
    "recordsTotal"    => intval( $totalRecords ),  
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data
    );
// send data as json format
echo json_encode($json_data);  
?>