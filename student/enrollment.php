<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['tutor_fname'])) {
        // Redirect to the login page
        header("Location: ../Auth/login.php");
        exit();
    }

    // Check if the enroll button is clicked
    if(isset($_GET['enrollcourse'])) {
        // Assuming you have session data for the tutor ID
        $tutor_id = $_SESSION['registration_id'];
        
        // Assuming you can retrieve the course ID from the URL parameter
        $course_id = $_GET['course_id'];
        $course_name = $_GET['course_name'];
        $course_description = $_GET['course_description'];
        $enrollment_status=$_GET['Waiting Approval'];
        
        // Check if the tutor is already enrolled in the course
        $check_query = "SELECT * FROM enrolled_course WHERE registration_id = '$tutor_id' AND course_id = '$course_id'";
        $check_result = mysqli_query($con, $check_query);
        if(mysqli_num_rows($check_result) > 0) {
            // Tutor is already enrolled in the course
            echo "<script>alert('You are already enrolled in this course.')</script>";
            echo "<script>window.open('courses.php','_self')</script>";

        } else {
            // Insert enrollment record into the database
            $enrollment_status='Waiting Approval';
            $insert_query = "INSERT INTO enrolled_course (course_id,registration_id, enrolled_course_name,enrolled_course_description,enrolled_course_date, enrolled_course_status) 
            VALUES ('$course_id','$tutor_id', '$course_name','$course_description', NOW(), '$enrollment_status')";
            $insert_result = mysqli_query($con, $insert_query);
            
        
            
            if($insert_result) {
                // Enrollment successful
                echo "<script>alert('Enrollment request submitted. Waiting for approval.')</script>";
                echo "<script>window.open('courses.php','_self')</script>";
            } else {
                // Enrollment failed
                echo "<script>alert('Failed to enroll. Please try again.')</script>";
                echo "<script>window.open('courses.php','_self')</script>";

            }
        }
    }
?>