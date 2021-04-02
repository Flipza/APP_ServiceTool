<?php
require 'mdb_creds.php';
// php select option value from database
$selected_sn = ($_REQUEST['selected_sn']);
// preparing SQL Query for selected serial number
$query_sn = "SELECT serialnumber, manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
$db_id = mysqli_query($connect, $query_sn);
while ($row = mysqli_fetch_array($db_id)) {
    // Extract information from the array and assign corresponding variables
    $row_sn = $row['serialnumber'];
    $row_man = $row['manufacturer'];
    $row_mod = $row['model'];
    $row_size = $row['size'];
    $row_color = $row['color'];
    $row_year = $row['year'];
}

// Create array and return to protokoll.php
$db_call_return = array("serialnumber"=>$row_sn, "manufacturer"=>$row_man, "model"=>$row_mod, "size"=>$row_size, "color"=>$row_color, "year"=>$row_year);
print json_encode($db_call_return);
?>
