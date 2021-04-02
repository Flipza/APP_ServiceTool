<?php
// DB Connection
require 'mdb_creds.php';

// php select option value from database
$sn = $_POST['sn_res'];
$man = $_POST['man_res'];
$mod = $_POST['mod_res'];
$size = $_POST['size_res'];
$color = $_POST['color_res'];
$year = $_POST['year_res'];

// SQL Statement
$sql = 'INSERT INTO mgp_db (serialnumber, manufacturer, model, size, color, year)';
$sql .=" VALUES ('$sn', '$man', '$mod', '$size', '$color', '$year')";
    
if ($connect->query($sql)){
    echo "Records added successfully.";
} else {
    echo "ERROR: Failed to execute $sql. ";
}
//Forwarding to the protokoll page after 3 seconds
header("refresh:3;protokoll.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Update Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
    <h1></h1>
    <main>
	<p>Sie werden in kürze auf die Protokollseite umgeleitet. . . </p>
    </main>
    </body>

</html>