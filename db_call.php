<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'dbuser';
$DATABASE_PASS = 'NOIU:5678-fghj+9876';
$DATABASE_NAME = 'maintenance_db';
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// php select option value from database
$selected_sn = ($_REQUEST['selected_sn']);
//$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber='$selected_sn'";
$query_sn = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
$db_id = mysqli_query($connect, $query_sn);
while ($row = mysqli_fetch_array($db_id)) {
    $row_man = $row['manufacturer'];
    $row_mod = $row['model'];
    $row_size = $row['size'];
    $row_color = $row['color'];
    $row_year = $row['year'];
}
// php select option value from database
//$selected_ma = ($_REQUEST['selected_ma']);
//$query_ma = "SELECT vorname, nachname year FROM tbl_ma WHERE serialnumber='$selected_sn'";
//$db_id = mysqli_query($connect, $query_sn);
//while ($row = mysqli_fetch_array($db_id)) {
    //$row_man = $row['manufacturer'];
    //$row_mod = $row['model'];

//}


//echo $result_dropdown;
$db_call_return = array("manufacturer"=>$row_man, "model"=>$row_mod, "size"=>$row_size, "color"=>$row_color, "year"=>$row_year);
print json_encode($db_call_return);
?>
