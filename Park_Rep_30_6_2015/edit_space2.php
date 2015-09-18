

<?php 

require 'user_header.php'

?>



        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        <div id="spaceListing"  class="container-fluid">
            <script>
            
            
            </script>
            
            
        <?php
            
        

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $addid=$_POST['add_id'];
        
        $sql="SELECT Add_ID, Address, City, County, Country FROM Address WHERE Owner_ID='".$own_id."'AND Add_ID='".$addid."'";

        $result=mysqli_query($conn, $sql);

           

        // extract data from array
        while($row = mysqli_fetch_assoc($result)){
            
            print "<div id=\"add_1\"  class=\"container\">";
        
            print "<div class=\"col-md-6\">";
                    print "<div id=\"panelAddress\" class=\"panel panel-primary\">";
                    print "<h3>".$row['Address']."</h3>";
                    print "<h3>".$row['City']." , ".$row['County']." , ".$row['Country']."</h3>";
                    print "</div>";
                        print "<br/>";
                        
                    print"</div>";
            
            
            print "<div class=\"col-md-6\">";
            print "Please select the times when your parking space is available. Values of \"--:--\" in both columns ";  
            print "for a day indicate the space is unavailable on that particular day.";
            print "<br/><br/>";
            print "<form method=\"post\" action=\"editAvail.php\" onsubmit=\"return checkTimes()\">";
                print "<table id=\"new_pspace\" class=\"table-condensed\">";
            
            
            $sql2="SELECT Day_name, Avail_start, Avail_end FROM Availability WHERE Add_ID='".$addid."'";
            
            $result2=mysqli_query($conn, $sql2);
            
            
            
            while($row2=mysqli_fetch_array($result2)){
            
                        $start = $row2[1];
                        $end = $row2[2];
                           /* if($start == 0){
                                $start = "--:--";  
                            }
                            if ($start == 0.01){
                                $start = "0.00";
                            }
                            if($end == 0){
                                $end = "--:--";  
                            }*/
            
               
                    print "<tr>";
                        print "<td>".$row2[0]."</td>"; 
                        print "<td>";
                        print "<select id=\"".$row2[0]."_start\" name=\"".$row2[0]."_start\" value=".$row2[1].">";
                            print "<option style=\"display: none;\" id=\"".$row2[0]."_start\">".$start."</option>";
                            print "<option value=\"\">--:--</option>";
                            print "<option value=\"0.01\">0:00</option>";
                            print "<option value=\"1.00\">1:00</option>";
                            print "<option value=\"2.00\">2:00</option>";
                            print "<option value=\"3.00\">3:00</option>";
                            print "<option value=\"4.00\">4:00</option>";
                            print "<option value=\"5.00\">5:00</option>";
                            print "<option value=\"6.00\">6:00</option>";
                            print "<option value=\"7.00\">7:00</option>";
                            print "<option value=\"8.00\">8:00</option>";
                            print "<option value=\"9.00\">9:00</option>";
                            print "<option value=\"10.00\">10:00</option>";
                            print "<option value=\"11.00\">11:00</option>";
                            print "<option value=\"12.00\">12:00</option>";
                            print "<option value=\"13.00\">13:00</option>";
                            print "<option value=\"14.00\">14:00</option>";
                            print "<option value=\"15.00\">15:00</option>";
                            print "<option value=\"16.00\">16:00</option>";
                            print "<option value=\"17.00\">17:00</option>";
                            print "<option value=\"18.00\">18:00</option>";
                            print "<option value=\"19.00\">19:00</option>";
                            print "<option value=\"20.00\">20.00</option>";
                            print "<option value=\"21.00\">21:00</option>";
                            print "<option value=\"22.00\">22:00</option>";
                            print "<option value=\"23.00\">23:00</option>";
                            print "<option value=\"24.00\">24:00</option>";
                        print "</select>";
                        print "</td>";
                        print "<td>to</td>";
                        print "<td>";
                        print "<select id=\"".$row2[0]."_end\" name=\"".$row2[0]."_end\" value=".$row2[2].">";
                            print "<option style=\"display: none;\" id=\"selectVal\" >".$end."</option>";
                           print "<option value=\"\">--:--</option>";
                            print "<option value=\"0.01\">0:00</option>";
                            print "<option value=\"1.00\">1:00</option>";
                            print "<option value=\"2.00\">2:00</option>";
                            print "<option value=\"3.00\">3:00</option>";
                            print "<option value=\"4.00\">4:00</option>";
                            print "<option value=\"5.00\">5:00</option>";
                            print "<option value=\"6.00\">6:00</option>";
                            print "<option value=\"7.00\">7:00</option>";
                            print "<option value=\"8.00\">8:00</option>";
                            print "<option value=\"9.00\">9:00</option>";
                            print "<option value=\"10.00\">10:00</option>";
                            print "<option value=\"11.00\">11:00</option>";
                            print "<option value=\"12.00\">12:00</option>";
                            print "<option value=\"13.00\">13:00</option>";
                            print "<option value=\"14.00\">14:00</option>";
                            print "<option value=\"15.00\">15:00</option>";
                            print "<option value=\"16.00\">16:00</option>";
                            print "<option value=\"17.00\">17:00</option>";
                            print "<option value=\"18.00\">18:00</option>";
                            print "<option value=\"19.00\">19:00</option>";
                            print "<option value=\"20.00\">20.00</option>";
                            print "<option value=\"21.00\">21:00</option>";
                            print "<option value=\"22.00\">22:00</option>";
                            print "<option value=\"23.00\">23:00</option>";
                            print "<option value=\"24.00\">24:00</option>";
                        print "</select>";
                        print "</td>";
                        print "<td style=\"visibility: hidden\" id=\"".$row2[0]."_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                        print "</tr>";
                        
            }
                        print "<tr><td colspan=\"5\" style=\"visibility: hidden;\">&nbsp;</td></tr>";
                        print "<tr id=\"mssgRow\"><td id=\"errorMssg\" colspan=\"5\" style=\"color: #7E0D21; visibility: hidden;\">The end time must be later than the start time!</td></tr>";
                        print "<tr><td colspan=\"5\" style=\"visibility: hidden;\">&nbsp;</td></tr>";
                        print "<tr><td><button type=\"submit\" id=\"saveChanges\" class=\"btn btn-primary btn-lg\">Save</button></td>";                          
                print"</table><br/>";
                    print "<input type=\"hidden\" name=\"add_id\" value=".$addid.">";
                print "</form>";
        }
            mysqli_close();

            ?>
            
                        <div>
                            
                            <button onclick="presets" id="presets" class="btn btn-default">Change Times</button>
                            &nbsp;&nbsp;
                            <select name='presetsList' id='presetsList' value='presetsList'>
                                <option value=''>Presets</option>
                                <option value="9-5">9:00 - 5:00</option>
                                <option value="allDay">24/7</option>
                            </select>
                            
                        </div>
            
            </div>
            
            </div>
            <br/>
            
        </div>
        
        <script>
            
            
            
            $('#presets').click(function(){
                
                var Val = $('[name="presetsList"]').val();
                console.log(Val);
                
                if (Val == '9-5'){
                    
                $('select').prop('disabled', false);
                
                $('[name="Monday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="Tuesday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="Wednesday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="Thursday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="Friday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="Saturday_start"] option[value=""]').prop('selected', true);
                $('[name="Sunday_start"] option[value=""]').prop('selected', true);
                $('[name="Monday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="Tuesday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="Wednesday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="Thursday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="Friday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="Saturday_end"] option[value=""]').prop('selected', true);
                $('[name="Sunday_end"] option[value=""]').prop('selected', true);
                    
                }
                
                if (Val == 'allDay'){
                    
                $('select').prop('disabled', false)
                
                $('[name="Monday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Tuesday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Wednesday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Thursday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Friday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Saturday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Sunday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="Monday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Tuesday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Wednesday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Thursday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Friday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Saturday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="Sunday_end"] option[value="24.00"]').prop('selected', true);
                }
                
            });
                
            
                $(window).load(function(){
                    
                var mon_s = $('#Monday_start').val();
                var tues_s = $('#Tuesday_start').val();
                var wed_s = $('#Wednesday_start').val();
                var thur_s = $('#Thursday_start').val();
                var fri_s = $('#Friday_start').val();
                var sat_s = $('#Saturday_start').val();
                var sun_s = $('#Sunday_start').val();
                    
                var mon_e = $('#Monday_end').val();
                var tues_e = $('#Tuesday_end').val();
                var wed_e = $('#Wednesday_end').val();
                var thur_e = $('#Thursday_end').val();
                var fri_e = $('#Friday_end').val();
                var sat_e = $('#Saturday_end').val();
                var sun_e = $('#Sunday_end').val();
                
                if(mon_s == '0.01'){
                    $('#Monday_start').val('0.00');
                }
                if(tues_s == '0.01'){
                    $('#Tuesday_start').val('0.00');
                }
                if(wed_s == '0.01'){
                    $('#Wednesday_start').val('0.00');
                }
                if(thur_s == '0.01'){
                    $('#Thursday_start').val('0.00');
                }
                if(fri_s == '0.01'){
                    $('#Friday_start').val('0.00');
                }
                if(sat_s == '0.01'){
                    $('#Saturday_start').val('0.00');
                }
                if(sun_s == '0.01'){
                    $('#Sunday_start').val('0.00');
                }
                if (mon_s == '0.00'){
                    $('[name="Monday_end"]').attr('disabled', true);
                    $('[name="Monday_end"]').val('0.00');
                    
                    $('#Monday_start').change(function(){
                        $('[name="Monday_end"]').attr('disabled', false);
                    });
                }
                if (tues_s == '0.00'){
                    $('[name="Tuesday_end"]').attr('disabled', true);
                    $('[name="Tuesday_end"]').val('0.00');
                    
                    $('#Tuesday_start').change(function(){
                        $('[name="Tuesday_end"]').attr('disabled', false);
                    });
                }
                if (wed_s == '0.00'){
                    $('[name="Wednesday_end"]').attr('disabled', true);
                    $('[name="Wednesday_end"]').val('0.00');
                    
                    $('#Wednesday_start').change(function(){
                        $('[name="Wednesday_end"]').attr('disabled', false);
                    });
                }
                if (thur_s == '0.00'){
                    $('[name="Thursday_end"]').attr('disabled', true);
                    $('[name="Thursday_end"]').val('0.00');
                    
                    $('#Thursday_start').change(function(){
                        $('[name="Thursday_end"]').attr('disabled', false);
                    });
                }
                if (fri_s == '0.00'){
                    $('[name="Friday_end"]').attr('disabled', true);
                    $('[name="Friday_end"]').val('0.00');
                    
                    $('#Friday_start').change(function(){
                        $('[name="Friday_end"]').attr('disabled', false);
                    });
                }
                if (sat_s == '0.00'){
                    $('[name="Saturday_end"]').attr('disabled', true);
                    $('[name="Saturday_end"]').val('0.00');
                    
                    $("#Saturday_start").change(function(){
                        $('[name="Saturday_end"]').attr('disabled', false);
                    });
                }
                if (sun_s == '0.00'){
                    $('[name="Sunday_end"]').attr('disabled', true);
                    $('[name="Sunday_end"]').val('0.00');
                    
                    $('#Sunday_start').change(function(){
                        $('#Sunday_end').attr('disabled', false);
                    });
                }
                    
                
                    
                if(mon_s == '0.00'){
                    $('#Monday_start').val('');
                    $('#Monday_end').val('');
                }
                if(tues_s == '0.00'){
                    $('#Tuesday_start').val('');
                    $('#Tuesday_end').val('');
                }
                if(wed_s == '0.00'){
                    $('#Wednesday_start').val('');
                    $('#Wednesday_end').val('');
                }
                if(thur_s == '0.00'){
                    $('#Thursday_start').val('');
                    $('#Thursday_end').val('');
                }
                if(fri_s == '0.00'){
                    $('#Friday_start').val('');
                    $('#Friday_end').val('');
                }
                if(sat_s == '0.00'){
                    $('#Saturday_start').val('');
                    $('#Saturday_end').val('');
                }
                if(sun_s == '0.00'){
                    $('#Sunday_start').val('');
                    $('#Sunday_end').val('');
                }
                
                
                  
                    
                
                    
                $('[name="Monday_start"] option[value="' + mon_s + '"]').prop('selected', true);
                $('[name="Tuesday_start"] option[value="' + tues_s + '"]').prop('selected', true);
                $('[name="Wednesday_start"] option[value="' + wed_s + '"]').prop('selected', true);
                $('[name="Thursday_start"] option[value="' + thur_s + '"]').prop('selected', true);
                $('[name="Friday_start"] option[value="' + fri_s + '"]').prop('selected', true);
                $('[name="Saturday_start"] option[value="' + sat_s + '"]').prop('selected', true);
                $('[name="Sunday_start"] option[value="' + sun_s + '"]').prop('selected', true);
                $('[name="Monday_end"] option[value="' + mon_e + '"]').prop('selected', true);
                $('[name="Tuesday_end"] option[value="' + tues_e + '"]').prop('selected', true);
                $('[name="Wednesday_end"] option[value="' + wed_e + '"]').prop('selected', true);
                $('[name="Thursday_end"] option[value="' + thur_e + '"]').prop('selected', true);
                $('[name="Friday_end"] option[value="' + fri_e + '"]').prop('selected', true);
                $('[name="Saturday_end"] option[value="' + sat_e + '"]').prop('selected', true);
                $('[name="Sunday_end"] option[value="' + sun_e + '"]').prop('selected', true);
                    
                });
            
        
            function checkTimes(){
                
                var mon_s = $('#Monday_start').val();
                var tues_s = $('#Tuesday_start').val();
                var wed_s = $('#Wednesday_start').val();
                var thur_s = $('#Thursday_start').val();
                var fri_s = $('#Friday_start').val();
                var sat_s = $('#Saturday_start').val();
                var sun_s = $('#Sunday_start').val();
                
                var mon_e = $('#Monday_end').val();
                var tues_e = $('#Tuesday_end').val();
                var wed_e = $('#Wednesday_end').val();
                var thur_e = $('#Thursday_end').val();
                var fri_e = $('#Friday_end').val();
                var sat_e = $('#Saturday_end').val();
                var sun_e = $('#Sunday_end').val();
                
                if (parseInt(mon_e) < parseInt(mon_s)){
                    $('#Monday_start').focus();
                    $('#Monday_end').focus();
                    $('#Monday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(tues_e) < parseInt(tues_s)){
                    $('#Tuesday_start').focus();
                    $('#Tuesday_end').focus();
                    $('#Tuesday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(wed_e) < parseInt(wed_s)){
                    $('#Wednesday_start').focus();
                    $('#Wednesday_end').focus();
                    $('#Wednesday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(thur_e) < parseInt(thur_s)){
                    $('#Thursday_start').focus();
                    $('#Thursday_end').focus();
                    $('#Thursday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(fri_e) < parseInt(fri_s)){
                    $('#Friday_start').focus();
                    $('#Friday_end').focus();
                    $('#Friday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(sat_e) < parseInt(sat_s)){
                    $('#Saturday_start').focus();
                    $('#Saturday_end').focus();
                    $('#Saturday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(sun_e) < parseInt(sun_s)){
                    $('#Sunday_start').focus();
                    $('#Sunday_end').focus();
                    $('#Sunday_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }
                return true;
                
            }
            
            
        </script>
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>