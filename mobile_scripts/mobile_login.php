<?php 

header ("Access-Control-Allow-Origin: *");

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


if (isset($_POST["uname"]) === true && isset($_POST["pword"]) === true ) {
    
    $uname =$_POST['uname'];
    $pword =$_POST['pword'];


$sql ="SELECT * FROM Driver WHERE Driver_uname='".$uname."' AND Driver_pword='".$pword."'"; 

$result = mysqli_query($conn, $sql);
    
    $arr=array();
    while($row=mysqli_fetch_array($result)){
        array_push($arr, array('reg' =>$row['Driver_reg'], 'username'=>$row['Driver_uname'], 'password'=>$row['Driver_pword'],'email'=>$row['Driver_email']));
    }
    
  
$num_rows = mysqli_num_rows($result);
    
    

    if($num_rows === 0){
        echo "0";
        return false;
        exit();
    }
    else{ 
        echo json_encode($arr);
        exit();
    }
    
}


mysqli_close($conn);
?>