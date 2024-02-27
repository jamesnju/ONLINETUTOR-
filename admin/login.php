<?php
    include('../connection.php');
    @session_start();

    if(isset($_POST['login'])){
        $fname = $_POST['tutor_fname'];
        $password = $_POST['tutor_password'];

        $fetch_query = "SELECT * FROM `registration` WHERE tutor_fname='$fname'";
        $result_query = mysqli_query($con, $fetch_query);
        $row_count = mysqli_num_rows($result_query); //checks if row is empty

        if($row_count > 0){
            $data = mysqli_fetch_assoc($result_query);
            $_SESSION['tutor_fname'] = $fname;
            if(password_verify($password, $data['tutor_password'])){
                if ($data['role'] == 'admin') {
                    // Redirect admin to admin page
                    echo "<script>window.open('index.php','_self')</script>";
                } else {
                    // Redirect user to user page
                    echo "<script>window.open('../index.php','_self')</script>";
                }
            }
            else{
                $_SESSION['tutor_fname'] = $fname;
                echo "<script>alert('Wrong username or password')</script>";
            }
        }else{
            echo "<script>alert('User not found')</script>";
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Auth/registration.css">
    
 </head>
<body>
<div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Admin Login </h2>
        <fieldset class="row bg-dark">
        <form method="post" enctype="multipart/form-data">
            <label for="email">
                <p class="text">Username</p>
                <input type="text" placeholder="Enter fname.." name="tutor_fname" required>
            </label>
            <label for="contact">
                <p class="text">password</p>
                <input type="password" name="tutor_password" placeholder="Enter password*****" required>
            </label>
            
        
            <button class="btn1" type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="registration.php">click here</a></p>
        </form>
    </fieldset>
    </div>
    <script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
