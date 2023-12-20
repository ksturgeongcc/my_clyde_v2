<?php
include '../config/config.php';
$stmt = $conn->prepare("INSERT INTO student_comment (fk_news_id, student_num, comment) VALUES(?, ?, ?);");
$stmt->bind_param('iis', $_POST['fk_news_id'], $_POST['student_num'], $_POST['comment']);
$stmt->execute();
$conn->close();


header('Location: ../news');