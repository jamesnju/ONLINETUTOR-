<?php
// confirm.php
include("./connection.php");
session_start();

if(isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Update the course status to 'Active'
    $update_query = "UPDATE `enrolled_course` SET enrolled_course_status='Approved' WHERE course_id=$course_id";
    $result = mysqli_query($con, $update_query);

    if($result) {
        // Status updated successfully, redirect back to courses.php
        header("Location: viewenrolledcourses.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Handle update failure
        echo "<script>alert('Failed to update course status')</script>";
    }
} else {
    // Handle case where course_id parameter is not provided
    echo "<script>alert('Invalid request')</script>";
}
?>


