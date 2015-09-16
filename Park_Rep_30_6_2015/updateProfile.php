<?php

session_start();

$pword=$_SESSION['own_password'];

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

$newPword=$_POST['new_password'];

$_SESSION['own_password']=$newPword;

$sql="UPDATE Owner SET Owner_pword='".$newPword."' WHERE Owner_pword='".$pword."'";

if (mysqli_query($conn, $sql)) {
    echo "<h1>New record created successfully.</h1>";
    header ('Location: profile.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close();

?>