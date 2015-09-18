<?php 

header('Access-Control-Allow-Origin:*');



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $reg = $_POST['reg'];

    $sql="SELECT * FROM Transaction WHERE Driver_reg ='".$reg."' ORDER BY Trans_id DESC";

    $result= mysqli_query($conn, $sql);
    
        $sql2="SELECT SUM(Trans_amount) FROM Transaction WHERE Driver_reg ='".$reg."' AND Trans_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";

        $result2= mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);

        //sets the weekly amount reduced after Stripe fees -> db to regular amount paid by driver
        $sum = $row2['SUM(Trans_amount)'];
        $sumPreformat = ($sum + .24) + ($sum * .024);
        $sumTotal = number_format((float)$sumPreformat, '2', '.', '');
        

        $array=array();
        while($row = mysqli_fetch_array($result)){
        
        //sets the amount reduced after Stripe fees -> db to regular amount paid by driver
        $total_red = $row[5];
        $total_reverse = ($total_red + .24) + ($total_red * .024);     
        $total= number_format((float)$total_reverse, '2', '.', '');
            
        $array[]=array('id'=>$row[0], 'date'=> $row[1], 'reg'=> $row[2], 'in'=> $row[3], 'out'=> $row[4], 'total'=> $total, 'weekTotal'=>$sumTotal);
        }
        echo json_encode($array);

mysqli_close($conn);
?>