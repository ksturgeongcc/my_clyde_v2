<?php
include 'config.php';

// Password must be between 5 and 20 characters long.
if (strlen($_POST['psw']) > 20 || strlen($_POST['psw']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
$stmt = $conn->prepare('SELECT student_num, psw FROM student WHERE student_num = ? ');
$stmt->bind_param('i', $_POST['student_num']);
$stmt->execute();
$stmt->store_result();
// Store the result so we can check if the account exists in the database.
if ($stmt->num_rows > 0) {
    // student number already exists
    echo 'student number exists! Please choose another.';
} else {
    $stmt->close();
    // Username doesnt exists, insert new account
    $stmt = $conn->prepare("INSERT INTO student (student_num, firstname, surname, email, dob, address, postcode, psw) VALUES(?, ?, ?, ?, ?, ?, ?, ?);");
  
   
    $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    $stmt->bind_param('isssssss', $_POST['student_num'], $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['dob'], $_POST['address'], $_POST['postcode'], $password);
    $stmt->execute();
    $conn->close();
}

header('Location: ../login');
