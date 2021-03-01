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
print_r($_REQUEST);
echo $selected_sn;
$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber=$selected_sn";
echo $quer2;
$result_dropdown = mysqli_query($connect, $query2);
echo $result_dropdown;
?>
