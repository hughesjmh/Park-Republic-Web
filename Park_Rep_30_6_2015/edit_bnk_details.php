<?php 

require 'user_header.php';

?>



        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>    
        
        <!--Begin profile.php section-->
        
        <script type="text/javascript">
            
            function createPwordForm(){
                document.getElementById("editPword").style.display="block";
            };
            
            
        </script>
        
        <div class="container-fluid pspace_div">
            <div class="row">
            <div class="col-md-6 col-sm-6">
                <!--<div id="profileDetails" class="container">-->
                    <table class="pTableDetails">
                        <tr>
                            <td><strong>Name: </strong></td>
                            <td><?php echo $fname." ".$lname;?></td>
                        </tr>
                        <tr>
                            <td><strong>Email: </strong></td>
                            <td><?php echo $email;?></td>
                        </tr>
                        <tr>
                            <td><strong>Username: </strong></td>
                            <td><?php echo $uname;?></td>
                        </tr>
                        <tr>
                            <td><strong>Password: </strong></td>

                            <td>
                            <!--Returns and masks password and prints to screen-->   
                            <script>

                                var password = <?php echo json_encode($pword);?> ;
                                var result="";

                                for(var count =0; count < password.length; count++)
                                    result +="*";

                                document.write(result);

                            </script>

                            </td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default" onclick="createPwordForm()">Edit Password</button></td>
                        </tr>
                    </table>

                    <div id="editPword" style="display:none;" >
                    <form role="form" data-toggle="validator" id="passUpdate" method="post" action="updateProfile.php">

                        <tr>
                            <div class="form-group">
                                <td>
                                    <label for="own_password1" class="control-label">Password:</label>
                                    <input type="password" name="new_password" id="new_password" data-minlength="8" class="form-control" 
                                   value="<?php echo $pword;?>" data-error="The password must be at least 8 characters long" required>
                                    <div class="help-block with-errors"></div>
                                </td>
                            </div>

                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>
                                    <label for="own_password2" class="control-label">Re-type Password:</label>
                                    <input type="password" name="new_password2" id="new_password2" class="form-control" 
                                    value="<?php echo $pword;?>" data-match="#new_password" data-match-error="The passwords don't match" 
                                    required>
                                    <div class="help-block with-errors"></div>
                                </td>
                            </div>
                            <td><input type="submit" value="Save" class="btn btn-primary"></td>
                        </tr>

                    </form>
                    </div>
                        <br/>


                    <div id="picLoader" class="panel panel-default">
                        <div class="panel-heading">Photo Uploader</div>
                        <div class="panel-body">
                        <form role="form" action="photo_uploader.php" method="post" enctype="multipart/form-data">
                            <input name="theFile" type="file" class="file" >
                                    <br/>
                            <input name="Submit" type="submit" class="btn btn-default" value="Upload">
                        </form>
                        </div>
                    </div>
                </div>
                <?php
                
                header ('Access-Control-Allow-Origin: *');

                date_default_timezone_set("Europe/Dublin");

                

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql= "SELECT Owner_nsc, Owner_accountNo FROM Owner WHERE Owner_ID='".$own_id."'";

                $result=mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                $nsc = $row[0];
                $accNo = $row[1];

                mysqli_close($conn);
                
            ?>
            <div class="col-md-6 col-sm-6">
                
                <div id="bank-details" class="panel panel-default">
                    <div class="panel-heading"><strong>Bank Account Details</strong></div>
                    <div class="panel-body">
                        <form id="bankDetails" data-toggle="validator" role="form" action="submit_bnk_details.php" method="post">
                        <div class="form-group">
                        
                            <label for="nsc" class="control-label">NSC:</label>
                            <input type="text" name="nsc" id="nsc" pattern="^[0-9]{6}$" class="form-control" value="<?php echo $nsc;?>"
                                    data-error="6 numeric characters, e.g. 937096" required>
                            <div class="help-block with-errors"></div>
                            <br/>
                            </div>
                            <div class="form-group">
                            <label for="account-no" class="control-label">Account Number:</label>
                            <input type="text" name="accountno" id="accountno" pattern="^[0-9]{8}$" class="form-control" value="<?php echo $accNo;?>" 
                                    data-error="8 numeric characters, e.g. 12345678" required>
                            <div class="help-block with-errors"></div>
                            <br/>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Bank Details</button>
                        </form>
                        
                    </div>
                </div>
                
                <div id="accountDelete" class="panel panel-danger">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <p>If you wish to delete your account, all records will be lost!</p>
                        <form id="deleteAccount" role="form" action="deleteAccount.php" method="post" onsubmit="return confirmDelete()">
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                </div>

            </div>

            </div>
            </div>
        </div>
         
        <script>
        
            function confirmDelete(){
                var delAcc= confirm("Are you sure you want to delete your account?");
                if (delAcc){
                    return true;
                }else{
                    return false;
                }
            };
        
        </script>
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>
        
       