<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'dbuser';
$DATABASE_PASS = 'NOIU:5678-fghj+9876';
$DATABASE_NAME = 'maintenance_db';
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// php select option value from database
$query_sn = "SELECT serialnumber FROM mgp_db";
$result_sn = mysqli_query($connect, $query_sn);
$query2 = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='2469P43553'";


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Protokoll Page</title>
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
				<a href="search.php"><i class="fas fa-user-circle"></i>Suchfunktion</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
        <br></br>
        <div>
            <form action="">
                <label for="serialnumbers">Serial Number: </label>
                <select id="sn_select" name="serialnumber" class="dropdown">
					<?php while($row1 = mysqli_fetch_array($result_sn)):;?>
					<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
					<?php endwhile;?>
                </select>
                <br></br>
                <input type="submit" value="Auswahl">
            </form>
            <br></br>
            <label id="man">Manufacturer: </label>
            <label id="man_res">PLATZHALTER</label>
        </div>
    </body>

</html>