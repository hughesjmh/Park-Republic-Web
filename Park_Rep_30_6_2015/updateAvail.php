<?php 

require 'user_header.php'

?>

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

$add_id=$_POST['add_id'];
$mon_in=$_POST['monday_start'];
$mon_out=$_POST['monday_end'];
$tues_in=$_POST['tuesday_start'];
$tues_out=$_POST['tuesday_end'];
$wed_in=$_POST['wednesday_start'];
$wed_out=$_POST['wednesday_end'];
$thur_in=$_POST['thursday_start'];
$thur_out=$_POST['thursday_end'];
$fri_in=$_POST['friday_start'];
$fri_out=$_POST['friday_end'];
$sat_in=$_POST['saturday_start'];
$sat_out=$_POST['saturday_end'];
$sun_in=$_POST['sunday_start'];
$sun_out=$_POST['sunday_end'];

$sql="INSERT INTO Availability (Day_name, Avail_start, Avail_end, Add_ID)
VALUES  ('Monday', '".$mon_in."', '".$mon_out."', '".$add_id."'),
        ('Tuesday', '".$tues_in."', '".$tues_out."', '".$add_id."'),
        ('Wednesday', '".$wed_in."', '".$wed_out."', '".$add_id."'),
        ('Thursday', '".$thur_in."', '".$thur_out."', '".$add_id."'),
        ('Friday', '".$fri_in."', '".$fri_out."', '".$add_id."'),
        ('Saturday', '".$sat_in."', '".$sat_out."', '".$add_id."'),
        ('Sunday', '".$sun_in."', '".$sun_out."', '".$add_id."')";

if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $row['Add_ID'];
        //header ("Location: p_space.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$sql2="UPDATE Address
        SET Last_update=now() 
        WHERE Add_ID='".$add_id."'";

if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully.";
        header ("Location: p_space.php?success=2");
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

?>