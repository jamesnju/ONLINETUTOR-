<?php

include('./connection.php');
session_start();
if (!isset($_SESSION['tutor_fname'])) {
    // Redirect to the login page
    header("Location: ./Auth/login.php");
    exit();
}


$select_query="select * from `registration`";
$result=mysqli_query($con,$select_query);
while($row_fetch=mysqli_fetch_assoc($result)){
    $tutor_id = $row_fetch['tutor_id']; // Fetch the tutor_id

$tutor_fname=$row_fetch['tutor_fname'];
$tutor_lname=$row_fetch['tutor_lname'];
$tutor_email=$row_fetch['tutor_email'];
$tutor_pic=$row_fetch['tutor_pic'];
$tutor_password=$row_fetch['tutor_password'];
}

?>
<?php  

    if(isset($_POST['updateaccount'])){

        // $tutor_id=$tutor_id;
        $tutor_id = $tutor_id; // Fetch the tutor_id
        $tutor_fname=$_POST['tutor_fname'];
        $tutor_lname=$_POST['tutor_lname'];
        $tutor_email=$_POST['tutor_email'];
        $tutor_password=$_POST['tutor_password'];
        $tutor_pic=$_FILES['tutor_pic']['name'];
        $tutor_pic_tmp=$_FILES['tutor_pic']['tmp_name'];
        move_uploaded_file($tutor_pic_tmp,"./Auth/profileimg/$tutor_pic");
        //update query
        $update_query="update `registration` set tutor_fname='$tutor_fname',tutor_lname='$tutor_lname',tutor_email='$tutor_email',tutor_pic='$tutor_pic',tutor_password='$tutor_password'
        where tutor_id=$tutor_id";
        $result_query_update=mysqli_query($con,$update_query);
        if($result_query_update){
            echo "<script>alert('information updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";

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
    <link rel="stylesheet" href="./Auth/registration.css">
    
 </head>
<body>
<div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Edit Account Details</h2>
        <fieldset class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">	
                <p class="text">Tutor's First Name</p>
                <input type="text"  value="<?php echo $tutor_fname ?>"  name="tutor_fname" placeholder="Enter Name..">
            </label>
            <label for="fullname">	
                <p class="text">Tutor Last Name</p>
                <input type="text" name="tutor_lname"   value="<?php echo $tutor_lname ?>" placeholder="Enter Name..">
            </label>
            <label for="email">
                <p class="text">Email</p>
                <input type="email" value="<?php echo $tutor_email ?>"    placeholder="Enter email" name="tutor_email">
            </label>
            <label for="email"  class="ediimage">
                <p class="text">Profile</p>
                <input type="file"  placeholder="Enter email" name="tutor_pic">
                <img src="./Auth/profileimg/<?php echo $tutor_pic ?>" alt="user_image" class="editimage">;
            </label>
            <label for="contact">
                <p class="text">Password</p>
                <input type="password"  value="<?php echo $tutor_password ?>" name="tutor_password" placeholder="Enter contact..">
            </label>
            
            <!-- <label for="message">
                <p class="text">confirm password</p>
                <input type="password" name="confirm_password" placeholder="Enter specialty">
            </label> -->
            <button class="btn1" type="submit" name="updateaccount">update</button>
            <p> <a href="profile.php">Go Back to profile</a></p>
        </form>
    </fieldset>
    </div>
    <footer class=" bg-dark">
        <p class="text-light text-center">All rights Reserved &copy; 2024</p>
</footer>
    <script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>