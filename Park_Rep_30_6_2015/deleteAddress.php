<?php require "user_header.php";?>

<?php


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$add_ID=$_POST['add_ID'];

$sql="DELETE FROM Address WHERE Add_ID='".$add_ID."'";

if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        header ('Location: p_space.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

?>