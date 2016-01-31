<?php

$server   = "localhost";
$database = "snettle_moviewatchlist";
$username = "snettle_movie2";
$password = "pinklish1";

$conn = mysqli_connect("localhost", "snettle_movie2", "pinklish1", "snettle_moviewatchlist");

if (!$conn) {
    echo "Error: Unable to connect to database. ";
    echo "Debugging errno: " . mysqli_connect_errno();
    echo "Debugging error: " . mysqli_connect_error();
    exit;
}

?>
