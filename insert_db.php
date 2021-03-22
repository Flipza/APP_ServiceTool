<?php
// DB Connection
$mysqli = new mysqli("localhost","dbuser","NOIU:5678-fghj+9876","maintenance_db");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  } 


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
    
if ($mysqli->query($sql)){
    echo "Records added successfully.";
} else {
    echo "ERROR: Failed to execute $sql. ";
}
//Weiterleitung auf dei Protokollseite nach 3 Sekunden
header("refresh:3;protokoll.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Update Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script>

        </script>
	</head>
	<body class="loggedin">
    <h1></h1>
    <main>
	<p>Sie werden in kürze auf die Protokollseite umgeleitet. . . </p>
    </main>
    </body>

</html>