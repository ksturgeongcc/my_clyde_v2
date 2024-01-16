<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hn = "localhost";
$un = "student_admin";
$pw = "fAy(zy@[td14*-1!";
$db = "myclyde";


$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error){
    die("connection failed: " . $db->connect_error );
}


