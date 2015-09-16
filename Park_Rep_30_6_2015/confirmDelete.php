<?php 

require 'user_header.php'

?>

<?php

$add_ID=$_POST['add_id'];

?>


        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        <div class="container-fluid pspace_div">
        
            
        <?php
            
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

        $sql="SELECT Add_ID, Address, City, County, Country FROM Address WHERE Owner_ID='".$own_id."' AND 
        Add_ID='".$add_ID."'";
        
        $result=mysqli_query($conn, $sql);

        // extract data from array
        $row = mysqli_fetch_assoc($result);

        $address=$row['Address'];
        $city=$row['City'];
        $cty=$row['County'];
        $ctry=$row['Country'];

        mysqli_close();
        ?>
        <div id="add_1" class="container">
            <div class="col-md-8">
            <h4>Are you sure you want to delete the following address?</h4>
                <div id="panelAddress" class="panel panel-primary address_print">
                    <h3><?php echo $address;?></h3>
                    <h3><?php echo $city." , ".$cty." , ".$ctry;?></h3>
                </div>
            </div>
            <div class="col-md-2 delButtonDiv">
                <form id="confirmDelete" method="post" action="deleteAddress.php">
                <button id="deleteButton" type="submit" class="btn btn-success deleteButton"><span class="glyphicon glyphicon-ok"></span>Yes</button>&nbsp;
                <input type="hidden" name="add_ID" value="<?php echo $add_ID;?>"/>
                </form>
            </div>
            
            <div class="col-md-2 delButtonDiv">
                <button id="deleteButton" class="btn btn-danger deleteButton" onclick=window.location.href="p_space.php"><span class="glyphicon glyphicon-remove"></span>No</button>
            </div>
        </div>
    </div>
        
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>