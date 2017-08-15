<?php

// $exchange_rate = json_decode(file_get_contents("http://api.fixer.io/latest?base=USD&symbols=SGD"));
//
// echo '$1 USD = S$'.round($exchange_rate->rates->SGD, 2).' SGD';


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




// test GET
$sql = "SELECT * FROM prices";
$result = $conn->query($sql);

print_r($result);
