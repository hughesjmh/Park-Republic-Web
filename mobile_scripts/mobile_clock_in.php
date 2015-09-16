<?php

header ('Access-Control-Allow-Origin: *');

$servername = "parkrepublicdb.c8v7ykgj2zle.eu-west-1.rds.amazonaws.com";
$username = "prdbuser";
$password = "Gr3gWatch";
$dbname = "owners_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    require 'timezone_set.php';

    $addid = $_POST['add_id'];
    $reg = $_POST['car_reg'];

$sql="INSERT INTO Transaction (Trans_date, Driver_reg, In_time, Add_ID) VALUES (curdate() , '".$reg."', now(), '".$addid."')";

   if (mysqli_query($conn, $sql)) { 
       echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
         

mysqli_close($conn);

?>