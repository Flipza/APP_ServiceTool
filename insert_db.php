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
    } else{
        echo "ERROR: Failed to execute $sql. ";
        echo $sql;
    }
//$sql = "INSERT INTO mgp_dq (serialnumber, manufacturer, model, size, color, year) VALUES ("+$sn+", "+$man+", "+$mod+", "+$size+", "+$color+", "+$year+");";
//$query2 = "SELECT manufacturer FROM mgp_db WHERE serialnumber='$selected_sn'";
//$query_sn = "SELECT manufacturer, model, size, color, year FROM mgp_db WHERE serialnumber='$selected_sn'";
/*if (mysqli_query($connect, $sql){
    echo "New Record created successfully!";
} else {
    echo "Error";
}
alert("Row Inserted!");
*/

?>
