<?php

$hn = "localhost";
$un = "student_admin";
$pw = "xzg0ht-XQp!iWlty";
$db = "myclyde";

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error){
    die("connection failed: " . $db->connect_error );
}


