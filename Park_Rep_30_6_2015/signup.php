<?php

session_start();


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid=true;
    
    $_SESSION['own_uname']=$_POST['own_uname'];
    $_SESSION['own_password']=$_POST['own_password'];
    
    $fname =mysqli_real_escape_string($conn, $_POST['own_fname']);
    $lname =mysqli_real_escape_string($conn,$_POST['own_lname']);
    $uname =mysqli_real_escape_string($conn,$_POST['own_uname']);
    $pword =mysqli_real_escape_string($conn,$_POST['own_password']);
    $email =mysqli_real_escape_string($conn,$_POST['own_email']);

    $sql="INSERT INTO Owner (Owner_fname, Owner_lname, Owner_uname, Owner_pword, Owner_email, Owner_img_path) VALUES
    ('".$fname."', '".$lname."', '".$uname."', '".$pword."', '".$email."', 'img/avatar2.jpg')"; 

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        header ('Location: user.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$to = $email; // Send email to our user
$subject = 'Park Republic Registration'; // Give the email a subject 
$message = "
 
Thanks for signing up to Park Republic, ".$fname."!
Your account has been created, in the future you can log in with the following credentials. 
 
------------------------
Username: ".$uname."
Password: ".$pword."
------------------------

Sincerely,

The Park Republic Team.
 
"; // Our message above including the link
                     
$headers = 'From: info@parkrepublic.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

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
        <script src="js/validator.js"></script>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
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
        
        <div id="signup_div" class="container">
            <h4>Please enter your details below</h4>
            <!--form validation through validator.js plugin-->
            <form data-toggle="validator" role="form" id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group col-md-6 signup_style">
                    <label for="own_fname" class="control-label">Firstname:</label>
                    <input type="text" name="own_fname" id="own_fname" class="form-control"  data-error="Please enter your first name." placeholder="First Name" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 signup_style">
                    <label for="own_lname" class="control-label">Lastname:</label>
                    <input type="text" name="own_lname" id="own_lname" class="form-control" data-error="Please enter your last name." placeholder="Last Name" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 signup_style">
                    <label for="own_uname" class="control-label">Username:</label>
                    <input type="text" name="own_uname" id="own_uname" class="form-control" data-error="Please enter a username." placeholder="User Name" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 signup_style">
                    <label for="own_email" class="control-label">Email:</label>
                    <input type="email" name="own_email" id="own_email" class="form-control" data-error="Please enter a valid email." placeholder="Email Address" required> 
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 signup_style">
                    <label for="own_password1" class="control-label">Password:</label>
                    <input type="password" name="own_password" id="own_password" data-minlength="8" class="form-control" 
                           placeholder="Password" data-error="The password must be at least 8 characters long" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 signup_style">
                    <label for="own_password2" class="control-label">Re-type Password:</label>
                    <input type="password" name="own_password2" id="own_password2" class="form-control" 
                           placeholder="Re-Type Password" data-match="#own_password" data-match-error="The passwords don't match" 
                           required>
                    <div class="help-block with-errors"></div>
                </div>
                <br/>
                <div class="form-group">
                        <label><input id="terms-conditions" type="checkbox">&nbsp;I agree with the 
                            <a href="#" title="Terms and Conditions" id="popoverTerms" data-toggle="popover" data-trigger="click" 
            
data-content="YOU USE OUR SERVICES, YOU DO SO AT YOUR SOLE RISK. YOU ACKNOWLEDGE AND AGREE THAT Park Republic DOES NOT CHECK ANY PARKING SPACE OWNER, DRIVER, OR OTHER USER’S BACKGROUND OR RECORD. Park Republic IS A TRUST-BASED SYSTEM, AND THEREFORE DOES NOT TAKE RESPONSIBILITY FOR ANY POSSIBLE DAMAGE CAUSED TO VEHICLES, PROPERTIES, OR INDIVIDUALS DURING THE PROVISION OF THIS SERVICE. BY USING THIS SERVICE, YOU ACCEPT THAT Park Republic WILL TAKE A 15% COMMISSION OF ALL INCOME GENERATED BY PARKING SPACE OWNERS IN ORDER TO MAINTAIN THE SERVICE. DRIVERS AND OWNERS ARE ADVISED TO USE COMMON SENSE, AND BE AWARE OF ANY INSURANCE POLICIES WHICH MAY INFRINGE UPON THE LEGALITY OF THE USE OF OUR SERVICE. BE AWARE AND BE SAFE. OUR SERVICES ARE PROVIDED ON AN 'AS IS' AND 'AS AVAILABLE' BASIS. WE EXPRESSLY DISCLAIM, AND YOU WAIVE, ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT.">
                            Terms and Conditions
                            </a>
                        </label>
                    <br/>
                        <span id="termsError" style="color: #a94442;"></span>
                </div>
                <br/>
                <button type="submit" id="submit-btn" onclick="return termCheck()" class="btn btn-default">Submit</button>
        </form>
        </div>
        
        <script>
            
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
            
            $(document).ready(function(){
                $('#popoverTerms').popover({animation: true});
            });
            
            
            function termCheck(){
            
            if($("#terms-conditions").prop('checked') == false){
               
                document.getElementById('terms-conditions').focus();
                document.getElementById('termsError').innerHTML="You must agree with the Terms and Conditions before proceeding";
                return false;
            }
            
            }
        
        </script>
        
        <div id="paddingDiv" class="container">
        </div>
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>