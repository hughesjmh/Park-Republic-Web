<?php 

require 'user_header.php'

?>



        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Account</a></li>
            </ul>
        </div>
        
        <div id="spaceListing"  class="container-fluid">
            
            
            
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
            print "Please select the times when your parking space is available. Values of \"--:--\" in both columns for ";  
            print "for a day indicate the space is unavailable on that particular day.";
            print "<br/>";
            print "<form method=\"post\" action=\"editAvail.php\">";
                print "<table class=\"table-condensed\">";
               
                    print "<tr>";
                        print "<td>Monday</td>"; 
                        print "<td>";
                        print "<select id=\"monday_start\" name=\"monday_start\" value=\"--:--\">";
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
                        print "<select id=\"monday_end\" name=\"monday_end\" value=\"--:--\">";
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
                    print "</tr>";
                    print "<tr><td><button type=\"submit\" class=\"btn btn-primary\">Save</button></td></tr>";
                print"</table>";
                    print "<input type=\"hidden\" name=\"add_id\" value=".$row['Add_ID'].">";
                print "</form>";
            print "</div>";
            
            print "</div>";
            print "<br/>";
        }
        
    
        //$sql2="SELECT * FROM Availability WHERE Add_ID='".$row['Add_ID']."'"
            

            
        mysqli_close();

        ?>
        
            
        </div>
        
        
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>