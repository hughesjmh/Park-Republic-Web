<?php

header ('Access-Control-Allow-Origin: *');

$servername = "parkrepublicdb.c8v7ykgj2zle.eu-west-1.rds.amazonaws.com";
$username = "prdbuser";
$password = "Gr3gWatch";
$dbname = "owners_db";


// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("spaces");
$parnode = $dom->appendChild($node);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all the rows in the Address table
$sql = "SELECT * FROM Address WHERE 1";
$result = mysqli_query($conn, $sql);


if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
    
    $add_id=$row['Add_ID'];
    
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("space");
  $newnode = $parnode->appendChild($node);

    $newnode->setAttribute("address", $row['Address']);
    $newnode->setAttribute("city", $row['City']);
    $newnode->setAttribute("country", $row['Country']);
    $newnode->setAttribute("lat", $row['Lat']);
    $newnode->setAttribute("lng", $row['Lng']);
    //$newnode->setAttribute("pcode", $row['Pspace_code']);
    $newnode->setAttribute("add_id", $row['Add_ID']);
    
    //Selects the latest transaction from each Address
    $sql2="SELECT In_time, Out_time FROM Transaction WHERE Add_ID = '".$add_id."' ORDER BY Trans_ID DESC";
    
    $result2 = mysqli_query($conn, $sql2);
        
        $row2 = @mysqli_fetch_assoc($result2);
        
        $newnode = $parnode->appendChild($node);
        
        $newnode->setAttribute("in_time", $row2['In_time']);
        $newnode->setAttribute("out_time", $row2['Out_time']);
        
    
    $sql3="SELECT * FROM Availability WHERE Add_ID='".$add_id."'";
    
    $result3 = mysqli_query($conn, $sql3);
    
    
        while ($row3 = @mysqli_fetch_assoc($result3)){
            
        $day = $node->appendChild($dom->createElement("day"));
        $newnode=$node->appendChild($day);
        
        $newnode->setAttribute("addid", $add_id);
        $newnode->setAttribute("dayname", $row3['Day_name']);
        $newnode->setAttribute("in", $row3['Avail_start']);
        $newnode->setAttribute("out", $row3['Avail_end']);

        
    }
}

echo $dom->saveXML();

?>