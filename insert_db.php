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
    $record_added = 1;
} else {
    echo "ERROR: Failed to execute $sql. ";
    $record_added = 0;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Update Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script>
            var record_added = "<?php echo $record_added; ?>"
            function warnung() {
                alert(record_added)
                if (record_added = 1){
                    alert('Records added successfully.')
                    document.location.href = "https://www.simpli-biits.ch/protokoll.php"
                } else if (record_added = 0) {
                alert('ERROR: Failed to execute: '+$sql+'. ')
                document.location.href = "https://www.simpli-biits.ch/protokoll.php"
                } else {
                    alert('Unknown error Occured. Please Contact Admin!')
                }}
        </script>
	</head>
	<body class="loggedin">
    <h1>Window.alert</h1>
    <main>
	<p>Klicken Sie auf den Button, wenn Sie wirklich wissen wollen, was dann passiert!</p>
	<button id="button" onclick='warnung()'>OK</button>
    </main>
    </body>

</html>