<!--Starts db connection to pull header values, creates uName and pword variables to extract header data-->

<?php 

session_start(); 
    
$uname=$_SESSION['own_uname'];
$pword=$_SESSION['own_password'];

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
$sql = "SELECT Owner_ID, Owner_fname, Owner_lname, Owner_email, Owner_img_path FROM Owner WHERE Owner_uname='".$uname."' AND Owner_pword='".$pword."'";
$result = mysqli_query($conn, $sql);

// extract data from array
$row = mysqli_fetch_assoc($result);

    $own_id=$row["Owner_ID"];
    $fname=$row["Owner_fname"];
    $lname=$row["Owner_lname"];
    $img=$row["Owner_img_path"];
    $email=$row["Owner_email"];

mysqli_close($conn);

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
        <script src="js/validator.js"></script>
        <script src="js/scripts.js"></script>
        
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script>
            
            //Toggles pane for adding an address
            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideToggle("slow");
                });
            });
    
            
        </script>
        
    </head>
    <body>
       <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="logout.php"><span id="whiteText">Park Republic</span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php" ><span id="whiteText">Log Out</span></a></li>
                        <!--destroy session here, redirects -> logout.php -> index.html -->
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="ownerApp" class="container-fluid">
            <div id="userImage">
                <a href="user.php">
                <img class="img-thumbnail" src="<?php echo $img; ?>" />
                </a>
                    <br/>
            </div>
            <div id="userDetails">
                <?php
                    print "<h3>".$fname."&nbsp;".$lname."</h3>";
                    print $uname;
                ?>
            </div>
        </div>
        
        <?php 

        if ( isset($_GET['success']) && $_GET['success'] == 1 )
            {
                $message = "Your record has been saved.";
                 
            }

        ?>
        
        <script>
        
            $(document).ready(function(){
                    
                            $('#saveChangesConfirm').css('visibility', 'visible').hide().fadeIn(2000).fadeOut(3000);
                        
            });
            
        </script>
                    <div id="saveChangesConfirm" style="visibility: hidden">
                        <div id="inner-saveChange">
                        <?php 

                        if ( isset($_GET['success']) && $_GET['success'] == 1 )
                            {
                                echo "Your changes have been saved.";

                            }

                        if ( isset($_GET['success']) && $_GET['success'] == 2 )
                            {
                                echo "Your space has been saved.";

                            }

                        if ( isset($_GET['success']) && $_GET['success'] == 3 )
                            {
                                echo "Your bank details have been saved.";

                            }

                        ?>   
                        
                        </div>
                    </div>
                    <br/>
                    <br/>
        
        