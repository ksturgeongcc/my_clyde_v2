<?php
include '../config/config.php';
$studentNum = $_GET['student_num'];
$updateStudent = $conn->prepare("UPDATE student
SET
firstname = ?,
surname = ?,
email = ?,
address = ?,
postcode = ?,
fk_course = ?

where student_num = $studentNum  ");
$updateStudent->bind_param('ssssss',$_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['address'], $_POST['postcode'], $_POST['fk_course']);

$updateStudent->execute();

header("Location: ../a/allStudents");