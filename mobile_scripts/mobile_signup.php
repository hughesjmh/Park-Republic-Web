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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid=true;
    
    $carreg=$_POST['car_reg'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $uname =$_POST['uname'];
    $pword =$_POST['pword'];
    $email =$_POST['email'];

    $sql="INSERT INTO Driver (Driver_reg, Driver_fname, Driver_lname, Driver_uname, Driver_pword, Driver_email) VALUES
    ('".$carreg."', '".$fname."', '".$lname."', '".$uname."', '".$pword."', '".$email."')"; 

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $uname;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close();

?>
