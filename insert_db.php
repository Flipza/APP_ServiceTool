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
$sn = htmlspecialchars($_GET['sn_res']);
$man = htmlspecialchars($_GET['man_res']);
$mod = htmlspecialchars($_GET['mod_res']);
$size = htmlspecialchars($_GET['size_res']);
$year = htmlspecialchars($_GET['year_res']);
$color = htmlspecialchars($_GET['color_res']);

$sql = "INSERT INTO mgp_dq (serialnumber, manufacturer, model, size, color, year) VALUES ("+$sn+", "+$man+", "+$mod+", "+$size+", "+$color+", "+$year+");";
//$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber='$selected_sn'";
//$query_sn = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
if (mysqli_query($connect, $sql){
    echo "New Record created successfully!";
} else {
    echo "Error";
}
alert("Row Inserted!")

?>