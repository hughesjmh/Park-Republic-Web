<?php 

session_start(); 

$uname=$_SESSION['own_uname'];
$pword=$_SESSION['own_password'];



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Owner_ID, Owner_fname, Owner_lname, Owner_img_path FROM Owner WHERE Owner_uname='".$uname."' AND Owner_pword='".$pword."'";
$result = mysqli_query($conn, $sql);


// extract data from array
$row = mysqli_fetch_assoc($result);
        
    $fname=$row["Owner_fname"];
    $lname=$row["Owner_lname"];
    $img=$row["Owner_img_path"];

    
/*Code taken and modified from 
http://code.tutsplus.com/tutorials/how-to-use-amazon-s3-php-to-dynamically-store-and-manage-files-with-ease--net-31*/

if (!class_exists('S3'))require_once('S3.php');

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'CHANGETHIS');
if (!defined('awsSecretKey')) define('awsSecretKey', 'CHANGETHISTOO');

$s3 = new S3('', '');

//check whether a form was submitted
if(isset($_POST['Submit'])){
 
//retreive post variables
        $fileName = $_FILES['theFile']['name'];
        $fileTempName = $_FILES['theFile']['tmp_name'];
        $fileSize = $_FILES['theFile']['size'];
        $fileUrl = "https://s3-eu-west-1.amazonaws.com/photo-upload/".$fileName;
    
        $s3->putBucket("photo-upload", S3::ACL_PUBLIC_READ);
    
                //move the file
                if ($s3->putObjectFile($fileTempName, "photo-upload", $fileName, S3::ACL_PUBLIC_READ)) {
                    echo "We successfully uploaded your file.";
                }else{
                    echo "Something went wrong while uploading your file... sorry.";
                }    
}

$sql="UPDATE Owner  
SET Owner_img_path='".$fileUrl."'
WHERE Owner_uname='".$uname."'"; 


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Park Republic</title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/pr-stylesheet.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script>
            
            //Script sets timeout to send user back to profile page
            function profileReturn(){
                setTimeout(function(){window.location.href="profile.php";}, 3000);
            };
            
            
        </script>
        
    </head>
    <body onload="profileReturn();">
        

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span id="whiteText">Park Republic</span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php"><span id="whiteText">Log Out</span></a></li>
                        <!--destroy session here with function-->
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="ownerApp" class="container-fluid">
            <div id="userImage">
                <img class="img-thumbnail" src="<?php echo $img; ?>" />
                    <br/>
            </div>
            <div id="userDetails">
                <?php
                    print "<h3>".$fname."&nbsp;".$lname."</h3>";
                    print $uname;
                ?>
            </div>
        </div>
        
                    <br/><br/>
        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        <div class="container-fluid pspace_div">
            
            <div id="picLoader" class="container-fluid">
                <h3>Your file has been uploaded.</h3>
            </div>
            
        </div>
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>