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
$sn = $_POST['sn_res'];
$man = $_POST['man_res'];
$mod = $_POST['mod_res'];
$size = $_POST['size_res'];
$year = $_POST['year_res'];
$color = $_POST['color_res'];

$sql = "INSERT INTO mgp_dq (serialnumber, manufacturer, model, size, color, year) VALUES ("+$sn+", "+$man+", "+$mod+", "+$size+", "+$color+", "+$year+");";
//$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber='$selected_sn'";
//$query_sn = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
if (mysqli_query($connect, $sql){
    echo "New Record created successfully!";
} else {
    echo "Error";
}
alert("Row Inserted!");

if (!empty($sn) || !empty($man) || !empty($mod) || !empty($size) || !empty($year) || !empty($color)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "maintenance_db";
       //create connection
       $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
       if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
       } else {
        $SELECT = "SELECT serialnumber From mgp_db Where sn = ? Limit 1";
        $INSERT = "INSERT Into mgp_db (serialnumber, manufacturer, model, size, color, year) values(?, ?, ?, ?, ?, ?)";
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $sn);
        $stmt->execute();
        $stmt->bind_result($sn);
        $stmt->store_result();
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssssii", $sn, $man, $mod, $size, $color, $year);
         $stmt->execute();
         echo "New record inserted sucessfully";
        } else {
         echo "Paraglider already registered with this Serialnumber!";
        }
        $stmt->close();
        $conn->close();
       }
   } else {
    echo "All field are required";
    die();
   }
   ?>
?>
