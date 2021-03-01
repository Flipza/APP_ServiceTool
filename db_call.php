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
$query2 = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";

$db_id = mysqli_query($connect, $query2);
//while ($row = mysqli_fetch_array($db_id)) {
    //$result_dropdown = $row[0];
    //echo "guguus";
//}

// TEST für Rückgabe mit array
$column = array();

while($row = mysql_fetch_array($db_id)){
    $column[] = $row[$key];
//Edited - added semicolon at the End of line.1st and 4th(prev) line

}

//echo $result_dropdown;
echo $column;
?>
