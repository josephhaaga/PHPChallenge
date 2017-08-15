<?php

include "functions.php";
include "credentials.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$csv = array_slice(array_map('str_getcsv', file('./data/provided_data.csv')),1);
$unique_dates = array_unique(array_map("getTheDateMap", $csv));

// $exchange_rate = json_decode(file_get_contents("http://api.fixer.io/latest?base=USD&symbols=SGD"));
// echo '$1 USD = S$'.round($exchange_rate->rates->SGD, 2).' SGD';

$rates = array();

foreach($unique_dates as $key=>$value){
  $rates[$value] = json_decode(file_get_contents("http://api.fixer.io/".$value."?base=USD&symbols=SGD"))->rates->SGD;
}

echo '<pre>';
foreach($csv as $key=>$value){
  $date = getTheDateMap($value);

  $foolx_price = (floatval(substr($value[2],1)));
  $foolx_price_in_sgd = ($foolx_price * $rates[$date]);
  $csv[$key][5] = round($foolx_price_in_sgd,2);

  $tmfgx_price = (floatval(substr($value[3],1)));
  $tmfgx_price_in_sgd = ($tmfgx_price * $rates[$date]);
  $csv[$key][6] = round($tmfgx_price_in_sgd,2);

  $tmffib_price = (floatval(substr($value[4],1)));
  $tmffib_price_in_sgd = ($tmffib_price * $rates[$date]);
  $csv[$key][7] = round($tmffib_price_in_sgd,2);

  print_r($csv[$key]);
}
echo '</pre>';


$sql = '';
foreach($csv as $key=>$value){
  $sql .= "INSERT INTO prices (record_Date, record_Time, FOOLX_USD, FOOLX_SGD, TMFGX_USD, TMFGX_SGD, TMFFIB_USD, TMFFIB_SGD)
  VALUES ('".$value[0]."', '".$value[1]."', '".$value[2]."', '".$value[3]."', '".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."');";
}

if ($conn->multi_query($sql) === TRUE) {
    echo "Records inserted into Database!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
