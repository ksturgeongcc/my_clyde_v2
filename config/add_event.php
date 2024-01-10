<?php
include 'config.php';


    $stmt = $conn->prepare("INSERT INTO event (added_by, date, description, added_on) VALUES(?, ?, ?, NOW());");
      // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    $stmt->bind_param('iss', $_POST['added_by'], $_POST['date'], $_POST['description']);
    $stmt->execute();
    $conn->close();


header('Location: ../pages/admin/AddEvent.php');
