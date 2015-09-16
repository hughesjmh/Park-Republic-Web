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
    
    $addid=$_POST['add_id'];
    
    $sql="SELECT Address, City, County, Country FROM Address WHERE Add_ID = '".$addid."'"; 
    
    $result=mysqli_query($conn, $sql);
    $row=(mysqli_fetch_assoc($result));
    
    $arr = array();
    $arr[add] = array('address'=> $row['Address'], 'city' => $row['City'], 'county'=> $row['County'], 'country' => $row['Country']);   

echo json_encode($arr);

mysqli_close();

?>