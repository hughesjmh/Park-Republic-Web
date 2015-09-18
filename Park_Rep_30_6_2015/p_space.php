<?php 

require 'user_header.php'

?>

        <script>
        
            $(document).ready(function(){
                $("#saveChanges").click(function(){
                    $.get("http://ec2-54-77-234-254.eu-west-1.compute.amazonaws.com/Park_Rep_30_6_2015/editAvail.php",
                         function(data){
                            $('#saveChangesConfirm').html(data);
                    });
                        
                });
            });
            
        </script>

        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="p_space.php">Parking Spaces</a></li>
                <li><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        <div id="spaceListing"  class="container-fluid">
        <div id="saveChangesConfirm" style="visibility: hidden"></div>            
            
        <?php
            
        
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        
        //$sql="SELECT Add_ID, Address, City, County, Country FROM Address WHERE Owner_ID='".$own_id."'";
        $sql="SELECT * FROM Address LEFT JOIN Availability ON Address.Add_ID=Availability.Add_ID WHERE Owner_ID='".$own_id."' ORDER BY Last_update DESC, Day_ID ASC";

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
                        print "<div class=\"panel panel-danger\">";
                            print "<div class=\"panel-heading\">Delete Address</div>";
                            print "<div class=\"panel-body\">By deleting your address, you delete all parking spaces associated with it. This action can't be undone!</div>";
                        print "<form method=\"post\" action=\"confirmDelete.php\">";
                            print "<button type=\"submit\" class=\"btn btn-danger\">Delete Address</button>";
                            print "<input type=\"hidden\" name=\"add_id\" value=".$row['Add_ID'].">";
                        print "</form>";
                        print "</div>";
                    print"</div>";
                
                print "<div class=\"col-md-6\">";
                    print "<h4>Parking space timetable of availablity</h4>";
                    print "<table id=\"time_table\" class=\"table\">";
                        $start = $row['Avail_start'];
                        $end = $row['Avail_end'];
                            if($start == 0){
                                $start = "--:--";  
                            }
                            if ($start == 0.01){
                                $start = "0.00";
                            }
                            if($end == 0){
                                $end = "--:--";  
                            }
                        print "<tr>";
                            print "<td><strong>".$row['Day_name']."</strong></td>";
                            print "<td><strong>".$start."</strong></td>";
                            print "<td><strong>to</strong></td>";
                            print "<td><strong>".$end."</strong></td>";
                        print "</tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        $start = $row['Avail_start'];
                        $end = $row['Avail_end'];
                            if($start == 0){
                                $start = "--:--";  
                            }
                            if ($start == 0.01){
                                $start = "0.00";
                            }
                            if($end == 0){
                                $end = "--:--";  
                            }
                        print "<tr>";
                            print "<td><strong>".$row['Day_name']."</strong></td>";
                            print "<td><strong>".$start."</strong></td>";
                            print "<td><strong>to</strong></td>";
                            print "<td><strong>".$end."</strong></td>";
                        print "</tr>";
                        if($row['Day_name'] == "Sunday"){
                            break;   
                        }
                    }
                    print "</table>";
                    print "<br/>";
                    print "<form method=\"post\" action=\"edit_space2.php\">";
                            print "<button type=\"submit\" class=\"btn btn-primary\">Edit Details</button>";
                            print "<input type=\"hidden\" name=\"add_id\" value=".$row['Add_ID'].">";
                        print "</form>";
                print"</div>";
            
            print "</div>";
            print "<br/>";
        }
        
    
        //$sql2="SELECT * FROM Availability WHERE Add_ID='".$row['Add_ID']."'"
            

            
        mysqli_close();

        ?>
            
            
        </div>
        
        <div class="container pspace_div">
            
            <h3>
        </h3>
            <!--Begin form for adding an address-->
            <div id="flip"><h4>Add an Address</h4></div>
            <div id="panel">
                
            <!--form validation through validator.js plugin-->
            <form data-toggle="validator" role="form" id="addressForm" action="confirmAddress.php" method="post">
                <h4>Enter the address for your parking space:</h4>
                <div class="form-group">
                    <label for="address" class="control-label">Street address:</label>
                    <input type="text" name="address" id="address" class="form-control"  data-error="Please the street address." placeholder="44 Oak Street, Apt. 4" required>
                    <div class="help-block with-errors"></div>
                </div>
                <br/>
                <div class="form-group">
                    <label for="city" class="control-label">City:</label>
                    <input type="text" name="city" id="city" class="form-control" data-error="Please enter a city." placeholder="Cork" required>
                    <div class="help-block with-errors"></div>
                </div>
                <br/>
                <div class="form-group">
                    <label for="county" class="control-label">County:</label>
                        <select class="form-control" id="county" name="county">
                                    <option value="Carlow">Carlow</option>
                                    <option value="Cavan">Cavan</option>
                                    <option value="Clare">Clare</option>
                                    <option selected="selected" value="Cork">Cork</option>
                                    <option value="Donegal">Donegal</option>
                                    <option value="Dublin">Dublin</option>
                                    <option value="Galway">Galway</option>
                                    <option value="Kerry">Kerry</option>    
                                    <option value="Kildare">Kildare</option>
                                    <option value="Kilkenny">Kilkenny</option>
                                    <option value="Laois">Laois</option>
                                    <option value="Leitrim">Leitrim</option>
                                    <option value="Limerick">Limerick</option>
                                    <option value="Longford">Longford</option>
                                    <option value="Louth">Louth</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Meath">Meath</option>
                                    <option value="Monaghan">Monaghan</option>
                                    <option value="Offaly">Offaly</option>
                                    <option value="Roscommon">Roscommon</option>
                                    <option value="Sligo">Sligo</option>
                                    <option value="Tipperary">Tipperary</option>
                                    <option value="Waterford">Waterford</option>
                                    <option value="Westmeath">Westmeath</option>
                                    <option value="Wexford">Wexford</option>
                                    <option value="Wicklow">Wicklow</option>
                        </select>
                </div>
                <br/>
                <div class="form-group">
                <label for="country" class="control-label">Country:</label>
                <select class="form-control" pattern="^([A-Z]){2}$" id="country" name="country" data-error="Please select a country." required>               
                            <option value="AF">Afghanistan</option>
	                       <option value="AX">Åland Islands</option>
	                       <option value="AL">Albania</option>
	                       <option value="DZ">Algeria</option>
	                       <option value="AS">American Samoa</option>
	                       <option value="AD">Andorra</option>
	                       <option value="AO">Angola</option>
	                       <option value="AI">Anguilla</option>
	                       <option value="AQ">Antarctica</option>
	                       <option value="AG">Antigua and Barbuda</option>
	                       <option value="AR">Argentina</option>
	                       <option value="AM">Armenia</option>
	                       <option value="AW">Aruba</option>
	                       <option value="AU">Australia</option>
	                       <option value="AT">Austria</option>
	                       <option value="AZ">Azerbaijan</option>
	                       <option value="BS">Bahamas</option>
	                       <option value="BH">Bahrain</option>
	                       <option value="BD">Bangladesh</option>
	                       <option value="BB">Barbados</option>
	                       <option value="BY">Belarus</option>
	                       <option value="BE">Belgium</option>
	                       <option value="BZ">Belize</option>
	                       <option value="BJ">Benin</option>
	                       <option value="BM">Bermuda</option>
	                       <option value="BT">Bhutan</option>
	                       <option value="BO">Bolivia, Plurinational State of</option>
	                       <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	                       <option value="BA">Bosnia and Herzegovina</option>
	                       <option value="BW">Botswana</option>
	                       <option value="BV">Bouvet Island</option>
	                       <option value="BR">Brazil</option>
	                       <option value="IO">British Indian Ocean Territory</option>
	                       <option value="BN">Brunei Darussalam</option>
	                       <option value="BG">Bulgaria</option>
	                       <option value="BF">Burkina Faso</option>
	                       <option value="BI">Burundi</option>
	                       <option value="KH">Cambodia</option>
	                       <option value="CM">Cameroon</option>
	                       <option value="CA">Canada</option>
	                       <option value="CV">Cape Verde</option>
	                       <option value="KY">Cayman Islands</option>
	                       <option value="CF">Central African Republic</option>
	                       <option value="TD">Chad</option>
	                       <option value="CL">Chile</option>
	                       <option value="CN">China</option>
	                       <option value="CX">Christmas Island</option>
	                       <option value="CC">Cocos (Keeling) Islands</option>
	                       <option value="CO">Colombia</option>
	                       <option value="KM">Comoros</option>
	                       <option value="CG">Congo</option>
	                       <option value="CD">Congo, the Democratic Republic of the</option>
	                       <option value="CK">Cook Islands</option>
	                       <option value="CR">Costa Rica</option>
	                       <option value="CI">Côte d'Ivoire</option>
	                       <option value="HR">Croatia</option>
	                       <option value="CU">Cuba</option>
	                       <option value="CW">Curaçao</option>
	                       <option value="CY">Cyprus</option>
	                       <option value="CZ">Czech Republic</option>
	                       <option value="DK">Denmark</option>
	                       <option value="DJ">Djibouti</option>
	                       <option value="DM">Dominica</option>
	                       <option value="DO">Dominican Republic</option>
	                       <option value="EC">Ecuador</option>
	                       <option value="EG">Egypt</option>
	                       <option value="SV">El Salvador</option>
	                       <option value="GQ">Equatorial Guinea</option>
	                       <option value="ER">Eritrea</option>
	                       <option value="EE">Estonia</option>
	                       <option value="ET">Ethiopia</option>
	                       <option value="FK">Falkland Islands (Malvinas)</option>
	                       <option value="FO">Faroe Islands</option>
	                       <option value="FJ">Fiji</option>
	                       <option value="FI">Finland</option>
	                       <option value="FR">France</option>
	                       <option value="GF">French Guiana</option>
	                       <option value="PF">French Polynesia</option>
	                       <option value="TF">French Southern Territories</option>
	                       <option value="GA">Gabon</option>
	                       <option value="GM">Gambia</option>
	                       <option value="GE">Georgia</option>
	                       <option value="DE">Germany</option>
	                       <option value="GH">Ghana</option>
	                       <option value="GI">Gibraltar</option>
	                       <option value="GR">Greece</option>
	                       <option value="GL">Greenland</option>
	                       <option value="GD">Grenada</option>
	                       <option value="GP">Guadeloupe</option>
	                       <option value="GU">Guam</option>
	                       <option value="GT">Guatemala</option>
	                       <option value="GG">Guernsey</option>
	                       <option value="GN">Guinea</option>
	                       <option value="GW">Guinea-Bissau</option>
	                       <option value="GY">Guyana</option>
	                       <option value="HT">Haiti</option>
	                       <option value="HM">Heard Island and McDonald Islands</option>
	                       <option value="VA">Holy See (Vatican City State)</option>
	                       <option value="HN">Honduras</option>
	                       <option value="HK">Hong Kong</option>
	                       <option value="HU">Hungary</option>
	                       <option value="IS">Iceland</option>
	                       <option value="IN">India</option>
	                       <option value="ID">Indonesia</option>
	                       <option value="IR">Iran, Islamic Republic of</option>
	                       <option value="IQ">Iraq</option>
	                       <option selected="selected" value="IE">Ireland</option>
	                       <option value="IM">Isle of Man</option>
	                       <option value="IL">Israel</option>
	                       <option value="IT">Italy</option>
	                       <option value="JM">Jamaica</option>
	                       <option value="JP">Japan</option>
	                       <option value="JE">Jersey</option>
	                       <option value="JO">Jordan</option>
	                       <option value="KZ">Kazakhstan</option>
	                       <option value="KE">Kenya</option>
	                       <option value="KI">Kiribati</option>
	                       <option value="KP">Korea, Democratic People's Republic of</option>
	                       <option value="KR">Korea, Republic of</option>
	                       <option value="KW">Kuwait</option>
	                       <option value="KG">Kyrgyzstan</option>
	                       <option value="LA">Lao People's Democratic Republic</option>
	                       <option value="LV">Latvia</option>
	                       <option value="LB">Lebanon</option>
	                       <option value="LS">Lesotho</option>
	                       <option value="LR">Liberia</option>
	                       <option value="LY">Libya</option>
	                       <option value="LI">Liechtenstein</option>
	                       <option value="LT">Lithuania</option>
	                       <option value="LU">Luxembourg</option>
	                       <option value="MO">Macao</option>
	                       <option value="MK">Macedonia, the former Yugoslav Republic of</option>
	                       <option value="MG">Madagascar</option>
	                       <option value="MW">Malawi</option>
	                       <option value="MY">Malaysia</option>
	                       <option value="MV">Maldives</option>
	                       <option value="ML">Mali</option>
	                       <option value="MT">Malta</option>
	                       <option value="MH">Marshall Islands</option>
	                       <option value="MQ">Martinique</option>
	                       <option value="MR">Mauritania</option>
	                       <option value="MU">Mauritius</option>
	                       <option value="YT">Mayotte</option>
	                       <option value="MX">Mexico</option>
	                       <option value="FM">Micronesia, Federated States of</option>
	                       <option value="MD">Moldova, Republic of</option>
	                       <option value="MC">Monaco</option>
	                       <option value="MN">Mongolia</option>
	                       <option value="ME">Montenegro</option>
	                       <option value="MS">Montserrat</option>
	                       <option value="MA">Morocco</option>
	                       <option value="MZ">Mozambique</option>
	                       <option value="MM">Myanmar</option>
	                       <option value="NA">Namibia</option>
	                       <option value="NR">Nauru</option>
	                       <option value="NP">Nepal</option>
	                       <option value="NL">Netherlands</option>
	                       <option value="NC">New Caledonia</option>
	                       <option value="NZ">New Zealand</option>
	                       <option value="NI">Nicaragua</option>
	                       <option value="NE">Niger</option>
	                       <option value="NG">Nigeria</option>
	                       <option value="NU">Niue</option>
	                       <option value="NF">Norfolk Island</option>
	                       <option value="MP">Northern Mariana Islands</option>
	                       <option value="NO">Norway</option>
	                       <option value="OM">Oman</option>
	                       <option value="PK">Pakistan</option>
	                       <option value="PW">Palau</option>
	                       <option value="PS">Palestinian Territory, Occupied</option>
	                       <option value="PA">Panama</option>
	                       <option value="PG">Papua New Guinea</option>
	                       <option value="PY">Paraguay</option>
	                       <option value="PE">Peru</option>
	                       <option value="PH">Philippines</option>
	                       <option value="PN">Pitcairn</option>
	                       <option value="PL">Poland</option>
	                       <option value="PT">Portugal</option>
	                       <option value="PR">Puerto Rico</option>
	                       <option value="QA">Qatar</option>
	                       <option value="RE">Réunion</option>
	                       <option value="RO">Romania</option>
	                       <option value="RU">Russian Federation</option>
	                       <option value="RW">Rwanda</option>
	                       <option value="BL">Saint Barthélemy</option>
	                       <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
	                       <option value="KN">Saint Kitts and Nevis</option>
	                       <option value="LC">Saint Lucia</option>
	                       <option value="MF">Saint Martin (French part)</option>
	                       <option value="PM">Saint Pierre and Miquelon</option>
	                       <option value="VC">Saint Vincent and the Grenadines</option>
	                       <option value="WS">Samoa</option>
	                       <option value="SM">San Marino</option>
	                       <option value="ST">Sao Tome and Principe</option>
	                       <option value="SA">Saudi Arabia</option>
	                       <option value="SN">Senegal</option>
	                       <option value="RS">Serbia</option>
	                       <option value="SC">Seychelles</option>
	                       <option value="SL">Sierra Leone</option>
	                       <option value="SG">Singapore</option>
	                       <option value="SX">Sint Maarten (Dutch part)</option>
	                       <option value="SK">Slovakia</option>
	                       <option value="SI">Slovenia</option>
	                       <option value="SB">Solomon Islands</option>
	                       <option value="SO">Somalia</option>
	                       <option value="ZA">South Africa</option>
	                       <option value="GS">South Georgia and the South Sandwich Islands</option>
	                       <option value="SS">South Sudan</option>
	                       <option value="ES">Spain</option>
	                       <option value="LK">Sri Lanka</option>
	                       <option value="SD">Sudan</option>
	                       <option value="SR">Suriname</option>
	                       <option value="SJ">Svalbard and Jan Mayen</option>
	                       <option value="SZ">Swaziland</option>
	                       <option value="SE">Sweden</option>
	                       <option value="CH">Switzerland</option>
	                       <option value="SY">Syrian Arab Republic</option>
	                       <option value="TW">Taiwan, Province of China</option>
	                       <option value="TJ">Tajikistan</option>
	                       <option value="TZ">Tanzania, United Republic of</option>
	                       <option value="TH">Thailand</option>
	                       <option value="TL">Timor-Leste</option>
	                       <option value="TG">Togo</option>
	                       <option value="TK">Tokelau</option>
	                       <option value="TO">Tonga</option>
	                       <option value="TT">Trinidad and Tobago</option>
	                       <option value="TN">Tunisia</option>
	                       <option value="TR">Turkey</option>
	                       <option value="TM">Turkmenistan</option>
	                       <option value="TC">Turks and Caicos Islands</option>
	                       <option value="TV">Tuvalu</option>
	                       <option value="UG">Uganda</option>
	                       <option value="UA">Ukraine</option>
	                       <option value="AE">United Arab Emirates</option>
	                       <option value="GB">United Kingdom</option>
	                       <option value="US">United States</option>
	                       <option value="UM">United States Minor Outlying Islands</option>
	                       <option value="UY">Uruguay</option>
	                       <option value="UZ">Uzbekistan</option>
	                       <option value="VU">Vanuatu</option>
	                       <option value="VE">Venezuela, Bolivarian Republic of</option>
	                       <option value="VN">Viet Nam</option>
	                       <option value="VG">Virgin Islands, British</option>
	                       <option value="VI">Virgin Islands, U.S.</option>
	                       <option value="WF">Wallis and Futuna</option>
	                       <option value="EH">Western Sahara</option>
	                       <option value="YE">Yemen</option>
	                       <option value="ZM">Zambia</option>
	                       <option value="ZW">Zimbabwe</option>
                        </select>
                <div class="help-block with-errors"></div>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            
        </div>
        
        
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
    </body>
</html>