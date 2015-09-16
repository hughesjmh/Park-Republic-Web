<?php

//checks to see if meter is running, redirects to meter_progress.html if true

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
    

    if (isset($_POST['car_reg']) && ($_POST['car_reg']) !== null ){
        
        $reg=$_POST['car_reg'];
        
    }
    

    $sql="SELECT In_time, Out_time FROM Transaction WHERE Driver_reg='".$reg."' ORDER BY Trans_ID DESC LIMIT 1";

        $result=mysqli_query($conn, $sql);

        $row=mysqli_fetch_assoc($result);
        
        $in = $row['In_time'];
        $out = $row['Out_time'];

        if ($in !== null && $out === null){
            echo '1';
        }else{
            echo '0';
        }
   
mysqli_close($conn);

?>