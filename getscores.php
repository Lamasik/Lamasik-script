<?php
header('Access-Control-Allow-Origin: *');




$host="localhost"; // Host name 
$username="id13730544_dima"; // Mysql username
$password="yG-_bpg&@>o%<3JL"; // Mysql password
$db_name="id13730544_warfare"; // Database name
$tbl_name="scores"; // Table name

// Connect to server and select database.
$link = mysqli_connect("$host", "$username", "$password", "$db_name");

// Retrieve data from database
$sql="SELECT * FROM scores ORDER BY score DESC LIMIT 10";	// The 'LIMIT 10' part will only read 10 scores. Feel free to change this value
$result=mysqli_query($link, $sql);

// Start looping rows in mysql database.
while($rows=mysqli_fetch_array($result)){
echo $rows['name'] . "|" . $rows['score'] . "|";

// close while loop 
}

// close MySQL connection 
mysqli_close($link);
?>