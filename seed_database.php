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

function getTheDate($k){
  // return 0;
  return (substr($k[0],0,4).'-'.substr($k[0],4,2).'-'.substr($k[0],6,2));
}

// $exchange_rate = json_decode(file_get_contents("http://api.fixer.io/latest?base=USD&symbols=SGD"));
// echo '$1 USD = S$'.round($exchange_rate->rates->SGD, 2).' SGD';

$csv = array_slice(array_map('str_getcsv', file('./data/provided_data.csv')),1);
// echo '<pre>';
// echo 'AHHHHH';


//
// foreach(array_slice($csv, 1) as $key=>$value){
// }
// echo '</pre>';

$unique_dates = array_unique(array_map("getTheDate", $csv));

print_r($dates);

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
