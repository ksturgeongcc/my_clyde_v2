<?php
include '../config/config.php';
$nc_id = $_GET['nc_id'];
$updateComment = $conn->prepare("UPDATE student_comment
SET
active = 1
where nc_id = $nc_id  ");

$updateComment->execute();

header("Location: ../a/pending");