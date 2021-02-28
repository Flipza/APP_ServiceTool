<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","dbuser","NOIU:5678-fghj+9876","maintenance_db");
    $query=mysqli_query($con, "select * from cfg_demos where title LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['title'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>