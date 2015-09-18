<?php 

require 'user_header.php'

?>

<?php



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$add_id=$_POST['add_id'];
$sun_in=$_POST['Sunday_start'];
$sun_out=$_POST['Sunday_end'];
$mon_in=$_POST['Monday_start'];
$mon_out=$_POST['Monday_end'];
$tues_in=$_POST['Tuesday_start'];
$tues_out=$_POST['Tuesday_end'];
$wed_in=$_POST['Wednesday_start'];
$wed_out=$_POST['Wednesday_end'];
$thur_in=$_POST['Thursday_start'];
$thur_out=$_POST['Thursday_end'];
$fri_in=$_POST['Friday_start'];
$fri_out=$_POST['Friday_end'];
$sat_in=$_POST['Saturday_start'];
$sat_out=$_POST['Saturday_end'];

$sql="UPDATE Availability 
SET Avail_start= CASE Day_name
    WHEN 'Monday' THEN '".$mon_in."'
    WHEN 'Tuesday' THEN '".$tues_in."'
    WHEN 'Wednesday' THEN '".$wed_in."'
    WHEN 'Thursday' THEN '".$thur_in."'
    WHEN 'Friday' THEN '".$fri_in."'
    WHEN 'Saturday' THEN '".$sat_in."'
    WHEN 'Sunday' THEN '".$sun_in."'
    END,
    Avail_end= CASE Day_name
    WHEN 'Monday' THEN '".$mon_out."'
    WHEN 'Tuesday' THEN '".$tues_out."'
    WHEN 'Wednesday' THEN '".$wed_out."'
    WHEN 'Thursday' THEN '".$thur_out."'
    WHEN 'Friday' THEN '".$fri_out."'
    WHEN 'Saturday' THEN '".$sat_out."'
    WHEN 'Sunday' THEN '".$sun_out."'
    END
    WHERE Add_ID='".$add_id."'";
    /*'".$sun_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Sunday',
SET Avail_start='".$mon_in."', Avail_end='".$mon_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Monday',
SET Avail_start='".$tues_in."', Avail_end='".$tues_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Tuesday',
SET Avail_start='".$wed_in."', Avail_end='".$wed_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Wednesday',
SET Avail_start='".$thur_in."', Avail_end='".$thur_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Thursday',
SET Avail_start='".$fri_in."', Avail_end='".$fri_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Friday',
SET Avail_start='".$sat_in."', Avail_end='".$sat_out."' WHERE Add_ID='".$add_id."' AND Day_ID='Saturday'";*/


if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $row['Add_ID'];
        //header ("Location: p_space.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


$sql2="UPDATE Address
        SET Last_update=now() 
        WHERE Add_ID='".$add_id."'";

if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully.";
        header ("Location: p_space.php?success=1");
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }



mysqli_close($conn);

?>