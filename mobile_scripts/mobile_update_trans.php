<?php 

header("Access-Control-Allow-Origin:*");



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    require 'timezone_set.php';

    $transid=$_POST['trans_id'];
    $amtTotal=$_POST['total'];

    if ($amtTotal < .50){
        $amtTotal = .50;
    }

    //inputs the reduced amount after Stripe fees, VAT not included.
    $total_red = $amtTotal - ($amtTotal * .024) - .24;

    $sql = "UPDATE Transaction SET Out_time = now(), Trans_amount = '".$total_red."' WHERE Trans_ID = '".$transid."'";

    if(mysqli_query($conn, $sql)){
        echo "1";
    }else{
        echo "Connection error".mysqli_error();
    }

mysqli_close($conn);

?>