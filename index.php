<?php

include "functions.php";
include "credentials.php";

echo '<html><head><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><link rel="stylesheet" type="text/css" href="style.css">
</head><body>';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM prices";
$result = $conn->query($sql);
$table =  '<table>';
$dates = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($dates,getTheDate($row['record_Date']));
    $table .= '<tr class="FOOLX ' . getTheDate($row['record_Date']) . '">';
    $table .= '<td>' . getTheDate($row['record_Date']) . '</td><td>' . $row['FOOLX_USD'] . '</td><td>' . $row['FOOLX_SGD'] . '</td>';
    $table .= '</tr>';

    $table .= '<tr class="TMFGX ' . getTheDate($row['record_Date']) . '">';
    $table .= '<td>' . getTheDate($row['record_Date']) . '</td><td>' . $row['TMFGX_USD'] . '</td><td>' . $row['TMFGX_SGD'] . '</td>';
    $table .= '</tr>';

    $table .= '<tr class="TMFFIB ' . getTheDate($row['record_Date']) . '">';
    $table .= '<td>' . getTheDate($row['record_Date']) . '</td><td>' . $row['TMFFIB_USD'] . '</td><td>' . $row['TMFFIB_SGD'] . '</td>';
    $table .= '</tr>';
  }
  $table .= '</table>';
} else {
    echo "0 results";
}
$conn->close();

$dates = array_unique($dates);

$ticker_select = '<select class="tickers"><option value="all">All Tickers</option><option value="FOOLX">FOOLX</option>'.
'<option value="TMFGX">TMFGX</option><option value="TMFFIB">TMFFIB</option></select>';
$date_select = '<select class="dates"><option value="all">All Dates</option>';
foreach($dates as $key=>$value){
  $date_select .= '<option value="' . $value . '">' . $value . '</option>';
}
$date_select .= '</select>';
$controls = $date_select . $ticker_select;
echo $controls;
echo $table;

echo '<script type="text/javascript" src="interaction.js"></script></body></html>';
