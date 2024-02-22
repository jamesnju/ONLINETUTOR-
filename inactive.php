<?php
include("./connection.php");
session_start();

// Check if the course_id is received from the URL
if(isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    
    // Update the course status to 'Inactive' in the database
    $update_query = "UPDATE `course_list` SET course_status='Inactive' WHERE course_id=$course_id";
    $result = mysqli_query($con, $update_query);
    
    if($result) {
        echo "<script>alert('Course status updated to Inactive')</script>";
    } else {
        echo "<script>alert('Failed to update course status')</script>";
    }
}

// Fetch and display the courses
$select_course= "SELECT * FROM `course_list`";
$course_result = mysqli_query($con, $select_course);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h2>Are you sure you want to confirm?</h2>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" name="makepayment" class="bg-primary px-3 py-3-2 border-0" value="Confirm Payment">
        </div>
        <button type="submit" name="confirmactive">Confirm</button>
    </form>
</body>
</html>