<?php



//Database connection.

$con = MySQLi_connect(

   "localhost", //Server host name.

   "dbuser", //Database username.

   "NOIU:5678-fghj+9876", //Database password.

   "maintenance_db" //Database name or anything you would like to call it.

);



//Check connection

if (MySQLi_connect_errno()) {

   echo "Failed to connect to MySQL: " . MySQLi_connect_error();

}

?>