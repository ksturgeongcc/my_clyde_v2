<?php
    include '../config/config.php';

    $student_num = $_GET['student_num'];
    
    // Delete from student_enrolment
    $deleteEnrolment = $conn->prepare("DELETE FROM student_enrolment WHERE fk_student = ?");
    $deleteEnrolment->bind_param("s", $student_num);
    $deleteEnrolmentSuccess = $deleteEnrolment->execute();
    $deleteEnrolment->close();
    
    // Delete from student
    $deleteStudent = $conn->prepare("DELETE FROM student WHERE student_num = ?");
    $deleteStudent->bind_param("s", $student_num);
    $deleteStudentSuccess = $deleteStudent->execute();
    $deleteStudent->close();
    
    // Check if both deletions were successful before redirecting
    if ($deleteEnrolmentSuccess && $deleteStudentSuccess) {
        header('Location: ../a/allStudents');
    } else {
        echo "Error deleting student or enrolment.";
    }
    ?>
    

