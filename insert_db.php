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
$sn = $_REQUEST['sn_res'];
$man = $_REQUEST['man_res'];
$mod = $_REQUEST['mod_res'];
$size = $_REQUEST['size_res'];
$year = $_REQUEST['year_res'];
$color = $_REQUEST['color_res'];

$sql = "INSERT INTO mgp_dq (serialnumber, manufacturer, model, size, color, year) VALUES ("+$sn+", "+$man+", "+$mod+", "+$size+", "+$color+", "+$year+");";
//$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber='$selected_sn'";
//$query_sn = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
if (mysqli_query($connect, $sql){
    echo "New Record created successfully!";
} else {
    echo "Error";
}
alert("Row Inserted!");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Basisrausch Servicetool</h1>
				<a href="home.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="protokoll.php"><i class="fas fa-user-circle"></i>Prüfprotokoll</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>