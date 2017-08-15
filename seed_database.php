<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "php_challenge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// parse existing data
$csv = array_map('str_getcsv', file('data/provided_data.csv'));
echo '<pre>';
print_r($csv);
echo '</pre>';

foreach($csv as $key=>$value){

}


//
// $sql = "INSERT INTO prices (record_Date,	record_Time,	FOOLX_USD,	FOOLX_SGD,	TMFGX_USD,	TMFGX_SGD,	TMFFIB_USD,	TMFFIB_SGD)
// VALUES ('John', 'Doe', 'john@example.com')";
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $conn->close();
