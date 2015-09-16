<?php 

session_start();

$servername = "parkrepublicdb.c8v7ykgj2zle.eu-west-1.rds.amazonaws.com";
$username = "prdbuser";
$password = "Gr3gWatch";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

mysql_select_db("owners_db")
  or die("Could not select examples"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid=true;
    
    $_SESSION['own_uname']=$_POST['own_uname'];
    $_SESSION['own_password']=$_POST['own_password'];
    
    $uname =$_POST['own_uname'];
    $pword =$_POST['own_password'];


$result = mysql_query("SELECT * FROM Owner WHERE Owner_uname='".$uname."' AND Owner_pword='".$pword."'"); 
  
$num_rows = mysql_num_rows($result);

    if($num_rows == 0){
        $valid = false;
        $error_message="<div class=\"alert alert-danger\" style=\"text-align: center;\">The username or password <br/> entered is incorrect.</div>" ; 
    }
    
    if($valid){  
        header ('Location: user.php');
        exit(); 
    }
    
}
    
mysql_close($conn);
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
        
        
       <!-- <script>
            
            function formValidation(){
                
                var x = document.forms["loginForm"];
                
                var uname = x.own_uname.value;
                var pword = x.own_password.value;
                
                if (uname==null || uname=""){
                    document.getElementById("login_error").innerHTML="There was a problem with your username or password.";
                    x.own_uname.focus();
                    return false;
                }else{
                    document.getElementById("login_error").innerHTML="";
                }
                if (pword==null || pword==""){
                    document.getElementById("login_error").innerHTML="There was a problem with your username or password.";
                    x.own_password.focus();
                    return false;
                }else{
                    document.getElementById("login_error").innerHTML="";
                }
                return true;
            };
        
        </script>-->
        
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
                    <a class="navbar-brand" href="index.html"><span id="whiteText">Park Republic</span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html#aboutUsDiv"><span id="whiteText">About Us</span></a></li>
                        <li><a href="login.php"><span id="whiteText">Log In</span></a></li>
                        <li><a href="signup.php"><span id="whiteText">Sign Up</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="login_div" class="container">
            <h4>Please enter you login details below</h4>
            <form role="form" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group">
                    <label for="own_uname">Username:</label>
                    <input type="text" name="own_uname" id="own_uname" class="form-control"
                           placeholder="Type your username here">
                </div>
                <div class="form-group">
                    <label for="own_password">Password:</label>
                    <input type="password" name="own_password" id="own_password" class="form-control"
                           placeholder="Type your password here">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <br/><br/>
                <?php echo $error_message;?>
            </form>
        </div>
            
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>