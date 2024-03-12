<?php

include('../connection.php');

if(isset($_POST['register'])){

    $fname = $_POST['tutor_fname'];
    $lname = $_POST['tutor_lname']; 
    $email = $_POST['tutor_email'];
    $role=$_POST['role'];
    $password = $_POST['tutor_password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $pic = $_FILES['tutor_pic']['name'];
    $pic_tmp = $_FILES['tutor_pic']['tmp_name'];

    $select_query = "select * from `registration` where registration_fname='$fname' or registration_email='$email'";
    $query= mysqli_query($con, $select_query);
    $row=mysqli_num_rows($query);

    if($row>0){
        echo  "<script>alert('username or email Exist')</script>";
        echo "<script>window.open('registration.php','_self')</script>";
    }else if($password != $confirm_password){
        echo  "<script>alert('password do not match')</script>";
        echo "<script>window.open('registration.php','_self')</script>";
    }else {
        $insert_query = "INSERT INTO `registration` (registration_fname, registration_lname, registration_email, registration_pic, registration_role, registration_password, registration_confirm_password) VALUES 
        ('$fname','$lname','$email','$pic','$role', '$hash_password', '$hash_password')"; // Added closing parenthesis
        $result = mysqli_query($con, $insert_query);
        /* store the image */
        move_uploaded_file($pic_tmp,"profileimg/$pic");
        echo "<script>alert('success')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
    
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    
 </head>
<body>
<div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Registration Form</h2>
        <fieldset class="row bg-dark">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">	
                <p class="text">Tutor First Name</p>
                <input type="text" name="tutor_fname" placeholder="Enter Name.." autofocus>
            </label>
            <label for="fullname">	
                <p class="text">Tutor Last Name</p>
                <input type="text" name="tutor_lname" placeholder="Enter Name..">
            </label>
            <label for="email">
                <p class="text">Email</p>
                <input type="email" placeholder="Enter email" name="tutor_email">
            </label>
            <label for="pic">
                <p class="text">Profile</p>
                <input type="file" placeholder="Enter email" name="tutor_pic">
            </label>
            <label for="pic">
                <p class="text">Role</p>
                <input type="text" placeholder="Enter role.." name="role">
            </label>
            <label for="contact">
                <p class="text">Password</p>
                <input type="password" name="tutor_password" placeholder="Enter password*******">
            </label>
            
            <label for="message">
                <p class="text">Confirm Password</p>
                <input type="password" name="confirm_password" placeholder="Enter confirm password*****">
            </label>
            <button class="btn1 text-light" type="submit" name="register">Register</button>
            <p  class="text-light">Have an account? <a href="login.php" class="text-danger  text-decoration">click here</a></p>
        </form>
    </fieldset>
    </div>
    <script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>