<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
// DB Connection
require 'mdb_creds.php';

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
			// Serialnumber Dropdownmenü
			$(document).ready(function(){
    			$("select.dropdown_sn").change(function(){
    			var selected_sn = $(this).children("option:selected").val();
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
		<!-- General Info, Get and Add Records from Database -->
		<div class="content">
		<h2>Deckblatt</h2>
		<div>
			<p>Search in the dropdown list for already registered paragliders. You can enter new entries by filling in all text boxes and pressing "Enter":</p>
			<form action="insert_db.php" method="POST">
			<table>
				<tr>
					<td>Search:</td>
					<td>
						<!-- Dynamische Dropdown Funkton, welche die Seriennummern der DB auflistet -->
						<select name="serialnumber" class="dropdown_sn">
							<?php while($row1 = mysqli_fetch_array($result_sn)):;?>
								<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
							<?php endwhile;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Serialnumber:</td>
					<td><input type='text'  size='40' id='sn_res' name='sn_res'/></td>
				</tr>
				<tr>
					<td>Manufacturer:</td>
					<td><input type='text'  size='40' id='man_res' name='man_res'/></td>
				</tr>
				<tr>
					<td>Model:</td>
					<td><input type='text'  size='40' id='mod_res' name='mod_res'/> </td>
				</tr>
				<tr>
					<td>Year:</td>
					<td><input type='text'  size='40' id='year_res' name='year_res'/> </td>
				</tr>
				<tr>
					<td>Size:</td>
					<td><input type='text'  size='40' id='size_res' name='size_res'/> </td>
				</tr>
				<tr>
					<td>Color:</td>
					<td><input type='text'  size='40' id='color_res' name='color_res'/> </td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" id="btn_erf">Enter new Entry</button></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
<!-- Maintenance Glider Protokoll -->
	<div class="content">
		<h2>Maintenance Glider Protokol</h2>
		<div>
			<p>Your Glider details are below:</p>
			<table>
				<tr for="location">
					<td>Location:</td>
					<td>
						<select name="location" class="dropdown">
							<!--Dynamische Dropdown Funkton, welche die Standorte der DB auflistet -->
							<?php while($row3 = mysqli_fetch_array($result_st)):;?>
								<option value="<?php echo $row3[0];?>"><?php echo $row3[0];?></option>
							<?php endwhile;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Date:</td>
					<td><input type='date' id='date_res' value='<?php echo date('Y-m-d');?>'/></td>
				</tr>
				<tr>
					<td>Standard:</td>
					<td><input type='text'  size='40' id='stand_res' name='stand_res' readonly/></td>
				</tr>
				<tr>
					<td>Inspector:</td>
					<td>
						<!--Dynamische Dropdown Funkton, welche die Standorte der DB auflistet -->
						<select name="inspector" class="dropdown">
							<?php while($row1 = mysqli_fetch_array($result_ma)):;?>
								<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
							<?php endwhile;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Serialnumber:</td>
					<td><input type='text'  size='40' id='sn_res_ro' name='sn_res' readonly/> </td>
				</tr>
				<tr>
					<td>Manufacturer:</td>
					<td><input type='text'  size='40' id='man_res_ro' name='man_res' readonly/> </td>
				</tr>
				<tr>
					<td>Model:</td>
					<td><input type='text'  size='40' id='mod_res_ro' name='mod_res' readonly/> </td>
				</tr>
				<tr>
					<td>Year:</td>
					<td><input type='text'  size='40' id='year_res_ro' name='year_res' readonly/> </td>
				</tr>
				<tr>
					<td>Size:</td>
					<td><input type='text'  size='40' id='size_res_ro' name='size_res' readonly/> </td>
				</tr>
				<tr>
					<td>Color:</td>
					<td><input type='text'  size='40' id='color_res_ro' name='color_res' readonly/> </td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>