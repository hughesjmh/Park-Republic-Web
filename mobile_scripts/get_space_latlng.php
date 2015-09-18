<?php

header ('Access-Control-Allow-Origin: *');

date_default_timezone_set("Europe/Dublin");



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $addid = $_POST['add_id'];
    
    $sql="SELECT Address, Lat, Lng FROM Address WHERE Add_ID='".$addid."'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $arr = array();
    $arr = array('lat'=>$row['Lat'], 'lng'=>$row['Lng'], 'address'=>$row['Address']);

    echo json_encode($arr);

?>