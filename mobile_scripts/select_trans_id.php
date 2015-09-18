<?php

header ('Access-Control-Allow-Origin: *');



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $addid = $_POST['add_id'];
    $reg = $_POST['car_reg'];

$sql="SELECT Trans_ID FROM Transaction WHERE Driver_reg='".$reg."' AND Add_ID='".$addid."' ORDER BY Trans_ID DESC";

        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        
        $arr=array();
        $arr= array('trans_id'=>$row['Trans_ID']);

        echo json_encode($arr);
    
       


mysqli_close($conn);

?>