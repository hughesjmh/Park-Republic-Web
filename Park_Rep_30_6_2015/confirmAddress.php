<?php require "user_header.php";?>

<?php

$address=htmlentities($_POST['address']);
$city=htmlentities($_POST['city']);
$country=htmlentities($_POST['country']);
$county=htmlentities($_POST['county']);

?>


        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
            <br/>
        <div class="container-fluid pspace_div">
            <div id="panelAddress" class="panel panel-primary address_print">
                    <h3><?php echo $address;?></h3>
                    <h3><?php echo $city." , ".$county." , ".$country;?></h3>
                </div>
            <h4>On confirmation, the above address will be added to our database and we will send you out a parking sign to the address listed. Do you wish to continue?</h4>
            <br/>
            <div class="col-md-2">
                <form method="post" action="addSpace.php">
                    <button type="submit" class="btn btn-default deleteButton"><span class="glyphicon glyphicon-ok"></span>Confirm</button>
                    <input type="hidden" name="address" value="<?php echo $address;?>"/>
                    <input type="hidden" name="city" value="<?php echo $city;?>"/>
                    <input type="hidden" name="country" value="<?php echo $country;?>"/>
                    <input type="hidden" name="county" value="<?php echo $county;?>"/>
                    <input type="hidden" id="lat" name="lat" value=""/>
                    <input type="hidden" id="lng" name="lng" value=""/>
                </form>
            </div>
            <div class="col-md-2">
                <button class="btn btn-default deleteButton" onclick=window.location.href="p_space.php"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
            </div>
        </div>
        
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
        <script type="text/javascript">

            
            //Geocode the address and inputs the lat and longitude values into hidden fields
                var geocoder = new google.maps.Geocoder();
                var address = "<?php echo $address.", ".$city.", ".$country;?>";

                geocoder.geocode( { 'address': address}, function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                    document.getElementById("lat").value=latitude;
                    document.getElementById("lng").value=longitude;
                    } 
                    
                
                }); 
            

        </script>
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>