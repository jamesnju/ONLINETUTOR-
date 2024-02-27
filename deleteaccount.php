<?php
include('./connection.php');
session_start(); // Start the session
if (!isset($_SESSION['tutor_fname'])) {
    // Redirect to the login page
    header("Location: ./Auth/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="delete.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
    <h3 class="text-center text-success mb-2">Delete account</h3>
    <h3 class="text-center text-danger mb-2">WARNING!! Once   Delete account  Cannot Be Recovered</h3>

    <form action="" method="post">
        <div class="">
            <button type="submit" class="text-danger fw-600" name="delete" value="">Delete  Account</button>
        </div>
        <div class="form-outline1">
            <button type="submit" class="text-success" name="dont_delete">Don't delete account</button>
        </div>
        <button><a href="profile.php">Back to profile</a></button>
    </form>
    <script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php 
    if(isset($_POST['delete'])){
        $tutor_fname=$_SESSION['tutor_fname'];
        $delete_query="Delete from `registration` where tutor_fname='$tutor_fname'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('deleted account')</script>";
            echo "<script>window.open('./login.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>
