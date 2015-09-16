<?php

require 'user_header.php';
                
header ('Access-Control-Allow-Origin: *');


date_default_timezone_set("Europe/Dublin");

$servername = "parkrepublicdb.c8v7ykgj2zle.eu-west-1.rds.amazonaws.com";
$username = "prdbuser";
$password = "Gr3gWatch";
$dbname = "owners_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nsc =$_POST['nsc'];
$accNo = $_POST['accountno'];


$sql="UPDATE Owner
        SET Owner_nsc='".$nsc."', Owner_accountNo='".$accNo."'
        WHERE Owner_ID='".$own_id."'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "It's all good.";
        header ("Location: profile.php?success=3");
    }else{
        echo "Damn!";
    }

mysqli_close($conn);

?>