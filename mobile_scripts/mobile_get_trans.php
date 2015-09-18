<?php

header ('Access-Control-Allow-Origin: *');

date_default_timezone_set("Europe/Dublin");


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
    require 'timezone_set.php';
    
    $transid=$_POST['trans_id'];

    $sql="SELECT * FROM Transaction WHERE Trans_ID = '".$transid."'"; 
    
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
            
            $reg=$row['Driver_reg'];


            //take 'In_time' string and parse
            $time_st=$row['In_time'];
            $day_st = substr($time_st,8, 2);
            $hour_st = (substr($time_st, 11, 2)) * 60;
            $min_st = substr($time_st, 14, 2);
            $timeTot_1 = $hour_st + $min_st;
            


            //take current date/time as 'time out'
            $time_end = date("Y-m-d H:i:s");
            $day_end = substr($time_end,8, 2);
            $hour_end = (substr($time_end, 11, 2)) * 60;
            $min_end = substr($time_end, 14, 2);
            $timeTot_2 = $hour_end + $min_end;
            
                //check for month-ending day transitions
                if($day_st < $day_end){
                    $day_st == 00;
                }

            $totDay = $day_end - $day_st;
            
            //calculates the total time to charge for in minutes
            $timeCharge = (($totDay * 1440) + $timeTot_2) - $timeTot_1;
            
            $amount_total;

            
            //sets variable rates for charges
            if ($timeCharge < 60){
                $varRate = 0.025;
            }elseif($timeCharge >= 60 && $timeCharge < 120){
                $varRate = 0.024;
            }elseif($timeCharge >= 120 && $timeCharge < 180){
                $varRate = 0.023;
            }elseif($timeCharge >= 180 && $timeCharge < 240){
                $varRate = 0.022;
            }elseif($timeCharge >= 240 && $timeCharge < 300){
                $varRate = 0.021;
            }elseif($timeCharge >= 300 && $timeCharge < 360){
                $varRate = 0.020;
            }elseif($timeCharge >= 360 && $timeCharge < 420){
                $varRate = 0.019;
            }elseif($timeCharge >= 420 && $timeCharge < 500){
                $varRate = 0.018;
            }elseif($timeCharge >= 500 && $timeCharge < 1440){
                $total = 10.00;
            }


            //charges by variable hourly rate
            $amount_total= $timeCharge * $varRate;

           

            //format number to 2 decimal places
            $total= number_format((float)$amount_total, '2', '.', '');

            //Calculate remaining time to park in space
        
            $epid = mysqli_real_escape_string($conn, $_POST['ep_id']);
            
            //If the value of $epid is string 'midnight', 'midnight' + 1 = 1, set string to 24.00
            if(($epid + 1) == 1){
                $epid = "24.00";
                
            }
            
            $hour_ep = (substr($epid, 0, 2)) * 60;
            $min_ep = substr($epid, 3, 2);
            $ep_total = $hour_ep + $min_ep;

            $minutesRemain = $ep_total - $timeTot_2;
            $ep_hours = floor($minutesRemain/60);
            $ep_minutes = fmod($minutesRemain, 60);
                
            if ($ep_minutes < 10){
                $ep_minutes = sprintf("%02d", $ep_minutes);
            }
                
            $timeRemain = $ep_hours."h ".$ep_minutes."m";
            
    
    
    $arr = array();
    $arr = array('trans_id'=> $transid, 'Reg' => $reg, 'In'=> $time_st, 'Out' => $time_end, 
                 'time_charge' => $timeCharge, 'total_charge'=>$total, 'time_remain' => $timeRemain);   

echo json_encode($arr);

mysqli_close();

?>