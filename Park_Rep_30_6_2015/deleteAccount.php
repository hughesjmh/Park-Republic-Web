<?php require "user_header.php";?>

<?php


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql="DELETE FROM Owner WHERE Owner_ID='".$own_id."'";

if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        header ('Location: logout.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

session_unset();
session_destroy(); 
$_SESSION = array();

mysqli_close($conn);

?>