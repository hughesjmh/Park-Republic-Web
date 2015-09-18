<?php

header ('Access-Control-Allow-Origin: *');



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    
    $addid=$_POST['add_id'];


    $sql2="SELECT Day_name, Avail_start, Avail_end FROM Availability WHERE Add_ID = '".$addid."'";

    $arr2 = array();

    $result2 = mysqli_query($conn, $sql2);
    while($row2 =mysqli_fetch_assoc($result2)){

    $arr2[] = array('day'=> $row2['Day_name'], 'start' => $row2['Avail_start'], 'end'=> $row2['Avail_end']);

    }


echo json_encode($arr2);


mysqli_close();

?>