<?php 

require 'user_header.php'

?>

        <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
        </script>
        
        <div id="appMenu" class="container-fluid">
            <br/>
            <ul class="nav nav-tabs">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="p_space.php">Parking Spaces</a></li>
                <li class="active"><a href="userAccount.php">Transactions</a></li>
            </ul>
        </div>
        
        
        <div class="container user-account">
            
            
            <?php

                date_default_timezone_set("Europe/Dublin");

                

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                
                            
                        $sql = "SELECT  * FROM Address INNER JOIN Transaction ON Address.Add_ID = Transaction.Add_ID WHERE Owner_ID = '".$own_id."' ORDER BY Trans_id DESC";
        
                        $result = mysqli_query($conn, $sql);
                        $numrow = mysqli_num_rows($result);

                        
                        
                        print "<table id=\"accountTable\" class=\"table\">";
                        
                            print "<thead>";
                                print "<th>Address</th>";
                                print "<th>Car Registration</th>";
                                print "<th>Meter Start</th>";
                                print "<th>Meter Finish</th>";
                                print "<th>Transaction Amount</th>";
                            print "</thead>";
                            print "<tr><td colspan=\"5\">
                            <a href=\"#\" data-toggle=\"popover\" data-placement=\"right\" title=\"Transaction Info\" data-content=\"You will be paid at the end of every month if your balance is more than 20 euros. Please note that a €.24 handling fee will be deducted from each transaction. Additionally, Park Republic takes a small commission of 15% each time so we can keep serving you as best as we can.\"><span class=\"glyphicon glyphicon-info-sign text-muted\" style=\"font-size: 16px;\"></span></a></td></tr>";
                        
                        
                        while ($row= mysqli_fetch_array($result)){
                        print "<tr>";
                            
                            print "<td>".$row[1]."</td>";
                            print "<td>".$row[12]."</td>";
                            print "<td id=\"start\">".$row[13]."</td>";
                            print "<td id=\"finish\">".$row[14]."</td>";
                            print "<td id=\"amount\">".$row[15]."</td>";
                            
                        print "</tr>";
                        
                        };

                        
                        if($numrow > 1){
                        $sql2 = "SELECT SUM(Trans_amount) FROM Address INNER JOIN Transaction ON Address.Add_ID = Transaction.Add_ID WHERE Owner_ID = '".$own_id."'";

                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);

                    $total = $row2['SUM(Trans_amount)'];
                        
                    print "<tr>";
                        print "<td></td>";
                        print "<td></td>";
                        print "<td></td>";
                        print "<td id=\"total\"><b>Total:  </b></td>";
                        print "<td id=\"totalPrint\"><b>".$total."</b></td>";
                    print "</tr>";
                    }
                    if ($numrow < 1){
                            print "<tr><td colspan=\"5\">";
                            print "<div id=\"user-transaction-info\" class=\"alert alert-warning\" style=\"text-align: center;\">Transactions on all of your parking spaces will go here.</div>"; 
                            print "</td></tr>";
                            }
                    print "</table>";
                    
                    
                        
                
                    
                
                
                    

            mysqli_close();         
                
            ?>
        
        </div>
        
        
        <footer class="footer">
                <div class="container">
                    <p class="text-muted">&copy; 2015</p>
                </div>
        </footer>
        
        <script>
            
            
        
            $(document).ready(function(){
                
                var start = $("#start").html();
                var finish = $("#finish").html();
                var amount = $("#amount").html();
                
                if (finish === null || finish === ""){
                    $("#finish").parent().css( "background-color", "#CCFFCC" );
                    $("#finish").html("Space Occupied").css('color', 'green');
                    
                    var day_st = start.substr(8, 2);
                    var hour_st = (start.substr(11, 2)) * 60;
                    var min_st = start.substr(14, 2);
                    var timeTot_1 = parseInt(hour_st) + parseInt(min_st);
                    
                    
                    var d = new Date();
                        var yyyy = d.getFullYear();
                        var mm = d.getMonth() +1;
                        if (mm <= 9){
                            mm = '0' + mm;
                        }
                        var dd = d.getDate();
                        if (dd <= 9){
                            dd = '0' + dd;
                        }
                        var hh = d.getHours();
                        if (hh <= 9){
                            hh = '0' + hh;
                        }
                        var min = d.getMinutes();
                        if (min <= 9){
                            min = '0' + min;
                        }
                        var ss = d.getSeconds();
                        if (ss <= 9){
                            ss = '0' + ss;
                        }

                    var finish = (yyyy +"-"+ mm +"-"+ dd +" "+ hh +":"+ min +":"+ ss);
                    var day_end = finish.substr(8, 2);
                    var hour_end = (finish.substr(11, 2)) * 60;
                    var min_end = finish.substr(14, 2);
                    var timeTot_2 = parseFloat(hour_end) + parseFloat(min_end);
                    
                    if(day_st < day_end){
                        day_st == 0;
                    }

                    var totDay = day_end - day_st;

                    //calculates the total time to charge for in minutes
                    var timeCharge = ((totDay * 1440) + timeTot_2) - timeTot_1;
                    var varRate, total;
                    
                    
                    //sets variable rates for charges
                    if (timeCharge < 60){
                        varRate = 0.025;
                    }else if(timeCharge > 60 && timeCharge < 120){
                        varRate = 0.024;
                    }else if(timeCharge > 120 && timeCharge < 180){
                        varRate = 0.023;
                    }else if(timeCharge > 180 && timeCharge < 240){
                        varRate = 0.022;
                    }else if(timeCharge > 240 && timeCharge < 300){
                        varRate = 0.021;
                    }else if(timeCharge > 300 && timeCharge < 360){
                        varRate = 0.020;
                    }else if(timeCharge > 360 && timeCharge < 420){
                        varRate = 0.019;
                    }else if(timeCharge > 420 && timeCharge < 500){
                        varRate = 0.018;
                    }else if(timeCharge > 500 && timeCharge < 1440){
                        total = 10.00;
                    }
                            
                    //charges by variable hourly rate
                    var amount_total= timeCharge * varRate;
                    
                    //calculates the reduction by Stripe
                    var amt_total_reduced = amount_total - (amount_total * .024); 
                        
                    
                    //format number to 2 decimal places
                    total= parseFloat(Math.round(amt_total_reduced * 100)/100).toFixed(2);
                    
                    
                    $("#amount").html(total).css('color', 'green');
                }
                
            });
            
        
        </script>
        
    </body>
</html>