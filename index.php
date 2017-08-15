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


// test GET
// $sql = "SELECT * FROM prices WHERE record_Date = 20170724";
$sql = "SELECT DISTINCT record_Date FROM prices ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // record_Date, record_Time, FOOLX_USD, FOOLX_SGD, TMFGX_USD, TMFGX_SGD, TMFFIB_USD, TMFFIB_SGD
        echo "Date: " . $row["record_Date"]. " - Time: " . $row["record_Time"]. " " .  "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
