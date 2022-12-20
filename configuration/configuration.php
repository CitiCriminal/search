<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "search";

$conn = mysqli_connect($server, $user, $password, $dbname);

if(!$conn){ 
    die("Connection Failed, Reason: " . mysqli_connect_error());
}