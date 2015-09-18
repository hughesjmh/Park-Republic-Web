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
            
            
            
        <?php
            
        

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        
        $sql="SELECT Add_ID, Address, City, County, Country FROM Address WHERE Owner_ID='".$own_id."'AND Add_ID=(SELECT MAX(Add_ID) FROM Address)";

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
                        print "<br/>";
                    print "<div id=\"attention-avail\" class=\"alert alert-warning\">";
                        print "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                        print "<strong>Attention!</strong> In order to start renting out your parking space, you must fill ";
                        print "out the information for the times the space will be available.";
                    print "</div>";
            print"</div>";
            
            print "<div class=\"col-md-6\">";
            print "Please select the times when your parking space is available. Values of \"--:--\" in both columns ";  
            print "for a day indicate the space is unavailable on that particular day.";
            print "<br/><br/>";
            print "<form method=\"post\" action=\"updateAvail.php\" onsubmit=\"return checkTimes()\">";
                print "<table id=\"new_pspace\" class=\"table-condensed\">";
                    
                    print "<tr>";
                        print "<td>Monday</td>"; 
                        print "<td>";
                        print "<select id=\"monday_start\" name=\"monday_start\" value=\"--:--\">";
                            print "<option>--:--</option>";
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
                        print "<select id=\"monday_end\" name=\"monday_end\" value=\"--:--\">";
                           print "<option >--:--</option>";
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
                        print "<td style=\"visibility: hidden\" id=\"mon_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                     print "<tr>";
                        print "<td>Tuesday</td>"; 
                        print "<td>";
                        print "<select id=\"tuesday_start\" name=\"tuesday_start\" value=\"--:--\">";
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
                        print "<select id=\"tuesday_end\" name=\"tuesday_end\" value=\"--:--\">";
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
                        print "<td style=\"visibility: hidden\" id=\"tues_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                     print "<tr>";
                        print "<td>Wednesday</td>"; 
                        print "<td>";
                        print "<select id=\"wednesday_start\" name=\"wednesday_start\" value=\"--:--\">";
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
                        print "<select id=\"wednesday_end\" name=\"wednesday_end\" value=\"--:--\">";
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
                        print "<td style=\"visibility: hidden\" id=\"wed_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                     print "<tr>";
                        print "<td>Thursday</td>"; 
                        print "<td>";
                        print "<select id=\"thursday_start\" name=\"thursday_start\" value=\"--:--\">";
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
                        print "<select id=\"thursday_end\" name=\"thursday_end\" value=\"--:--\">";
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
                    print "<td style=\"visibility: hidden\" id=\"thur_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                    print "<tr>";
                        print "<td>Friday</td>"; 
                        print "<td>";
                        print "<select id=\"friday_start\" name=\"friday_start\" value=\"--:--\">";
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
                        print "<select id=\"friday_end\" name=\"friday_end\" value=\"--:--\">";
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
                    print "<td style=\"visibility: hidden\" id=\"fri_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                    print "<tr>";
                        print "<td>Saturday</td>"; 
                        print "<td>";
                        print "<select id=\"saturday_start\" name=\"saturday_start\" value=\"--:--\">";
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
                        print "<select id=\"saturday_end\" name=\"saturday_end\" value=\"--:--\">";
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
                        print "<td style=\"visibility: hidden\" id=\"sat_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                    print "<tr>";
                        print "<td>Sunday</td>"; 
                        print "<td>";
                        print "<select id=\"sunday_start\" name=\"sunday_start\">";
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
                        print "<select id=\"sunday_end\" name=\"sunday_end\" value=\"--:--\">";
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
                        print "<td style=\"visibility: hidden\" id=\"sun_error\"><span class=\"glyphicon glyphicon-remove\" style=\"font-size: 14px; color: #7E0D21;\"></span></td>";
                    print "</tr>";
                    print "<tr><td colspan=\"5\" style=\"visibility: hidden;\">&nbsp;</td></tr>";
                    print "<tr id=\"mssgRow\"><td id=\"errorMssg\" colspan=\"5\" style=\"color: #7E0D21; visibility: hidden;\">The end time must be later than the start time!</td></tr>";
                    print "<tr><td colspan=\"5\" style=\"visibility: hidden;\">&nbsp;</td></tr>";
                    print "<tr><td><button type=\"submit\" onclick=\"checkTimes()\" class=\"btn btn-primary btn-lg\">Save</button></td></tr>";
                print"</table><br/>";
                    print "<input type=\"hidden\" name=\"add_id\" value=".$row['Add_ID'].">";
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
                
                $('[name="monday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="tuesday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="wednesday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="thursday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="friday_start"] option[value="9.00"]').prop('selected', true);
                $('[name="saturday_start"] option[value=""]').prop('selected', true);
                $('[name="sunday_start"] option[value=""]').prop('selected', true);
                $('[name="monday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="tuesday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="wednesday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="thursday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="friday_end"] option[value="17.00"]').prop('selected', true);
                $('[name="saturday_end"] option[value=""]').prop('selected', true);
                $('[name="sunday_end"] option[value=""]').prop('selected', true);
                    
                }
                
                if (Val == 'allDay'){
                    
                $('select').prop('disabled', false)
                
                $('[name="monday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="tuesday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="wednesday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="thursday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="friday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="saturday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="sunday_start"] option[value="0.01"]').prop('selected', true);
                $('[name="monday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="tuesday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="wednesday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="thursday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="friday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="saturday_end"] option[value="24.00"]').prop('selected', true);
                $('[name="sunday_end"] option[value="24.00"]').prop('selected', true);
                }
                
            });
                
            
                $(window).load(function(){
                    
                var mon_s = $('#monday_start').val();
                var tues_s = $('#tuesday_start').val();
                var wed_s = $('#wednesday_start').val();
                var thur_s = $('#thursday_start').val();
                var fri_s = $('#friday_start').val();
                var sat_s = $('#saturday_start').val();
                var sun_s = $('#sunday_start').val();
                    
                var mon_e = $('#monday_end').val();
                var tues_e = $('#tuesday_end').val();
                var wed_e = $('#wednesday_end').val();
                var thur_e = $('#thursday_end').val();
                var fri_e = $('#friday_end').val();
                var sat_e = $('#saturday_end').val();
                var sun_e = $('#sunday_end').val();
                
                if(mon_s == '0.01'){
                    $('#monday_start').val('0.00');
                }
                if(tues_s == '0.01'){
                    $('#tuesday_start').val('0.00');
                }
                if(wed_s == '0.01'){
                    $('#wednesday_start').val('0.00');
                }
                if(thur_s == '0.01'){
                    $('#thursday_start').val('0.00');
                }
                if(fri_s == '0.01'){
                    $('#friday_start').val('0.00');
                }
                if(sat_s == '0.01'){
                    $('#saturday_start').val('0.00');
                }
                if(sun_s == '0.01'){
                    $('#sunday_start').val('0.00');
                }
                if (mon_s == ''){
                    $('[name="monday_end"]').attr('disabled', true);
                    $('[name="monday_end"]').val('0.00');
                    
                    $('#monday_start').change(function(){
                        $('[name="monday_end"]').attr('disabled', false);
                    });
                }
                if (tues_s == ''){
                    $('[name="tuesday_end"]').attr('disabled', true);
                    $('[name="tuesday_end"]').val('0.00');
                    
                    $('#tuesday_start').change(function(){
                        $('[name="tuesday_end"]').attr('disabled', false);
                    });
                }
                if (wed_s == ''){
                    $('[name="wednesday_end"]').attr('disabled', true);
                    $('[name="wednesday_end"]').val('0.00');
                    
                    $('#wednesday_start').change(function(){
                        $('[name="wednesday_end"]').attr('disabled', false);
                    });
                }
                if (thur_s == ''){
                    $('[name="thursday_end"]').attr('disabled', true);
                    $('[name="thursday_end"]').val('0.00');
                    
                    $('#thursday_start').change(function(){
                        $('[name="thursday_end"]').attr('disabled', false);
                    });
                }
                if (fri_s == ''){
                    $('[name="friday_end"]').attr('disabled', true);
                    $('[name="friday_end"]').val('0.00');
                    
                    $('#friday_start').change(function(){
                        $('[name="friday_end"]').attr('disabled', false);
                    });
                }
                if (sat_s == ''){
                    $('[name="saturday_end"]').attr('disabled', true);
                    $('[name="saturday_end"]').val('0.00');
                    
                    $("#saturday_start").change(function(){
                        $('[name="saturday_end"]').attr('disabled', false);
                    });
                }
                if (sun_s == ''){
                    $('[name="sunday_end"]').attr('disabled', true);
                    $('[name="sunday_end"]').val('0.00');
                    
                    $('#sunday_start').change(function(){
                        $('#sunday_end').attr('disabled', false);
                    });
                }
                    
                
                    
                if(mon_s == '0.00'){
                    $('#monday_start').val('');
                    $('#monday_end').val('');
                }
                if(tues_s == '0.00'){
                    $('#tuesday_start').val('');
                    $('#tuesday_end').val('');
                }
                if(wed_s == '0.00'){
                    $('#wednesday_start').val('');
                    $('#wednesday_end').val('');
                }
                if(thur_s == '0.00'){
                    $('#thursday_start').val('');
                    $('#thursday_end').val('');
                }
                if(fri_s == '0.00'){
                    $('#friday_start').val('');
                    $('#friday_end').val('');
                }
                if(sat_s == '0.00'){
                    $('#saturday_start').val('');
                    $('#saturday_end').val('');
                }
                if(sun_s == '0.00'){
                    $('#sunday_start').val('');
                    $('#sunday_end').val('');
                }
                
                
                  
                    
                
                    
                $('[name="monday_start"] option[value="' + mon_s + '"]').prop('selected', true);
                $('[name="tuesday_start"] option[value="' + tues_s + '"]').prop('selected', true);
                $('[name="wednesday_start"] option[value="' + wed_s + '"]').prop('selected', true);
                $('[name="thursday_start"] option[value="' + thur_s + '"]').prop('selected', true);
                $('[name="friday_start"] option[value="' + fri_s + '"]').prop('selected', true);
                $('[name="saturday_start"] option[value="' + sat_s + '"]').prop('selected', true);
                $('[name="sunday_start"] option[value="' + sun_s + '"]').prop('selected', true);
                $('[name="monday_end"] option[value="' + mon_e + '"]').prop('selected', true);
                $('[name="tuesday_end"] option[value="' + tues_e + '"]').prop('selected', true);
                $('[name="wednesday_end"] option[value="' + wed_e + '"]').prop('selected', true);
                $('[name="thursday_end"] option[value="' + thur_e + '"]').prop('selected', true);
                $('[name="friday_end"] option[value="' + fri_e + '"]').prop('selected', true);
                $('[name="saturday_end"] option[value="' + sat_e + '"]').prop('selected', true);
                $('[name="sunday_end"] option[value="' + sun_e + '"]').prop('selected', true);
                    
                });
                
                
            
                
            
            function checkTimes(){
                
                var mon_s = $('#monday_start').val();
                var tues_s = $('#tuesday_start').val();
                var wed_s = $('#wednesday_start').val();
                var thur_s = $('#thursday_start').val();
                var fri_s = $('#friday_start').val();
                var sat_s = $('#saturday_start').val();
                var sun_s = $('#sunday_start').val();
                
                var mon_e = $('#monday_end').val();
                var tues_e = $('#tuesday_end').val();
                var wed_e = $('#wednesday_end').val();
                var thur_e = $('#thursday_end').val();
                var fri_e = $('#friday_end').val();
                var sat_e = $('#saturday_end').val();
                var sun_e = $('#sunday_end').val();
                
                if (parseInt(mon_e) < parseInt(mon_s)){
                    $('#monday_start').focus();
                    $('#monday_end').focus();
                    $('#mon_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(tues_e) < parseInt(tues_s)){
                    $('#tuesday_start').focus();
                    $('#tuesday_end').focus();
                    $('#tues_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(wed_e) < parseInt(wed_s)){
                    $('#wednesday_start').focus();
                    $('#wednesday_end').focus();
                    $('#wed_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(thur_e) < parseInt(thur_s)){
                    $('#thursday_start').focus();
                    $('#thursday_end').focus();
                    $('#thur_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(fri_e) < parseInt(fri_s)){
                    $('#friday_start').focus();
                    $('#friday_end').focus();
                    $('#fri_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(sat_e) < parseInt(sat_s)){
                    $('#saturday_start').focus();
                    $('#saturday_end').focus();
                    $('#sat_error').css('visibility', 'visible');
                    $('#errorMssg').css('visibility', 'visible');
                    return false;
                }else if (parseInt(sun_e) < parseInt(sun_s)){
                    $('#sunday_start').focus();
                    $('#sunday_end').focus();
                    $('#sun_error').css('visibility', 'visible');
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