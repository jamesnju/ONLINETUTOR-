<?php
include('./connection.php');
session_start(); // Start the session

// Rest of your PHP code goes here...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">delete account</h3>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <button type="submit" class="form-control m-auto w-50  bg-danger" name="delete" value=""><p  class="text-danger  ">delete  Account</p></button>
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control m-auto w-50" name="dont_delete" value="Don't delete account"/>
        </div>
        <a href="profile.php">Back to profile</a>
    </form>
    
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
