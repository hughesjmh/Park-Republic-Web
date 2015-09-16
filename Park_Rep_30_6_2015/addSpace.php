<?php require "user_header.php";?>


<?php

$servername = "parkrepublicdb.c8v7ykgj2zle.eu-west-1.rds.amazonaws.com";
$username = "prdbuser";
$password = "Gr3gWatch";
$dbname = "owners_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$address=mysqli_real_escape_string($conn, $_POST['address']);
$city=mysqli_real_escape_string($conn, $_POST['city']);
$country=mysqli_real_escape_string($conn, $_POST['country']);
$county=mysqli_real_escape_string($conn, $_POST['county']);
$lat=$_POST['lat'];
$lng=$_POST['lng'];

$sql="INSERT INTO Address (Address, City, Country, County, Owner_ID, Lat, Lng) 
VALUES ('".$address."', '".$city."', '".$country."', '".$county."', '".$own_id."', '".$lat."', '".$lng."')";


if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $row['Add_ID'];
        header ("Location: new_pspace.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

?>


