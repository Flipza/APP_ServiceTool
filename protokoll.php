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

// Serialnumber SQL
$query_sn = "SELECT serialnumber FROM mgp_db";
$result_sn = mysqli_query($connect, $query_sn);
$query2 = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='selected_sn'";
$result_dropdown = mysqli_query($connect, $query2);
// Mitarbeiter SQL
$query_ma = "SELECT inspector FROM tbl_ma";
$result_ma = mysqli_query($connect, $query_ma);
// Standorte SQL
$query_st = "SELECT standort FROM tbl_ort";
$result_st = mysqli_query($connect, $query_st);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Protokoll Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://code.jquery.com/jquery-latest.js"></script>
		<script>
			// Serialnumber Dropdownmenue
			$(document).ready(function(){
				$("select.dropdown_sn").change(function(){
        		var selected_sn = $(this).children("option:selected").val();
        		//alert("You have selected the SN: " + selected_sn);
				$.getJSON("https://www.simpli-biits.ch/db_call.php", {selected_sn: selected_sn}, function(data){
					$('#sn_res').val(data['serialnumber']);
					$('#man_res').val(data['manufacturer']);
					$('#mod_res').val(data['model']);
					$('#size_res').val(data['size']);
					$('#color_res').val(data['color']);
					$('#year_res').val(data['year']);
					// MGP General Abschnitt ReadOnly
					$('#sn_res_ro').val(data['serialnumber']);
					$('#man_res_ro').val(data['manufacturer']);
					$('#mod_res_ro').val(data['model']);
					$('#size_res_ro').val(data['size']);
					$('#color_res_ro').val(data['color']);
					$('#year_res_ro').val(data['year']);
					});
				});
			});
			function insertDB(){
				let sn = document.getElementById("sn_res").value;
				let man = document.getElementById("man_res").value;
				let mod = document.getElementById("mod_res").value;
				let size = document.getElementById("size_res").value;
				let color = document.getElementById("color_res").value;
				let year = document.getElementById("year_res").value;
				let sql = "INSERT INTO mgp_dq (serialnumber, manufacturer, model, size, color, year) VALUES ("+sn+", "+man+", "+mod+", "+size+", "+color+", "+year+");";
				alert(sql);
				return sql;
			}
			/*
			$(document).ready(function() {
  					$("#btn_erf").click(function () {
					// Val wird Anzeigeelemnet zugewiesen        
					$.ajax({
           				type: "POST",
           				url: "https://www.simpli-biits.ch/insert_db.php",
           				dataType: "json",
           				success: function (msg) {
               				if (msg) {
                   				alert("Somebody" + name + " was added in list !");
                   				location.reload(true);
               					} else {
                   					alert("Cannot add to list !");
               						}
           					}
					}		
		*/
		</script>
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
        <br></br>
        <div>
		<h1>Deckblatt</h1>
            <form action="https://www.simpli-biits.ch/insert_db.php" method="POST">
                <label for="serialnumbers">Serial Number: </label>
                <select name="serialnumber" class="dropdown_sn">
					<?php while($row1 = mysqli_fetch_array($result_sn)):;?>
						<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
					<?php endwhile;?>
                </select>
            <br></br>
			<p>Serialnumber: <input type='text'  size='40' id='sn_res' name='sn_res'/> </p>
			<p>Manufacturer: <input type='text'  size='40' id='man_res' name='man_res'/> </p>
			<p>Model: <input type='text'  size='40' id='mod_res' name='mod_res'/> </p>
			<p>Year: <input type='text'  size='40' id='year_res' name='year_res'/> </p>
			<p>Size: <input type='text'  size='40' id='size_res' name='size_res'/> </p>
			<p>Color: <input type='text'  size='40' id='color_res' name='color_res'/> </p>
			<button type="submit" id="btn_erf">Erfassen</button>
			</form>
			<br></br>
		<h1>Maintenance Glider Protokol</h1>
		<h3>General</h3>
		<label for="location">Location: </label>
		<select name="location" class="dropdown">
					<?php while($row1 = mysqli_fetch_array($result_st)):;?>
						<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
					<?php endwhile;?>
                </select>
		<p>Date: <input type='date' id='date_res' value='<?php echo date('Y-m-d');?>'/> </p>
		<p>Standard: <input type='text'  size='40' id='stand_res' name='stand_res' readonly/> </p>
		<label for="inspector">Inspector: </label>
		<select name="inspector" class="dropdown">
					<?php while($row1 = mysqli_fetch_array($result_ma)):;?>
						<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
					<?php endwhile;?>
                </select>
			<p>Serialnumber: <input type='text'  size='40' id='sn_res_ro' name='sn_res' readonly/> </p>
			<p>Manufacturer: <input type='text'  size='40' id='man_res_ro' name='man_res' readonly/> </p>
			<p>Model: <input type='text'  size='40' id='mod_res_ro' name='mod_res' readonly/> </p>
			<p>Year: <input type='text'  size='40' id='year_res_ro' name='year_res' readonly/> </p>
			<p>Size: <input type='text'  size='40' id='size_res_ro' name='size_res' readonly/> </p>
			<p>Color: <input type='text'  size='40' id='color_res_ro' name='color_res' readonly/> </p>
		</div>
    </body>

</html>