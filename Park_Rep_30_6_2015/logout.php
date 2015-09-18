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

/*while($row=mysql_fetch_array($result)){
    print "ID:".$row{'Owner_ID'}."<br/>Username: ".$row{'Owner_uname'}."<br/> Password: ".$row{'Owner_pword'}."<br/>";   
}*/



    // output data of each row
$row = mysqli_fetch_assoc($result);
        
    $fname=$row["Owner_fname"];
    $lname=$row["Owner_lname"];
    $img=$row["Owner_img_path"];



session_unset();
session_destroy(); 
$_SESSION = array();

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
            function indexReturn(){
                setTimeout(function(){window.location.href="index.html";}, 3000);
            };
            
            
        </script>
        
    </head>
    <body onload="indexReturn();">

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
                <li><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        <div class="container-fluid pspace_div">
            <h2>Thanks for stopping by..</h2>
        </div>
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>