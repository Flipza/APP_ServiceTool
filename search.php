<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","dbuser","NOIU:5678-fghj+9876","maintenance_db");
    $query=mysqli_query($con, "select * from mpg_db where serialnumber LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['serialnumber'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>