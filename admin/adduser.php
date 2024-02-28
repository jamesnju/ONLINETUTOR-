<?php
    include("../connection.php");
    session_start();

    if (!isset($_SESSION['tutor_fname'])) {
      // Redirect to the login page
      header("Location: login.php");
      exit();
  }

    
if(isset($_POST['adduser'])){

  $fname = $_POST['tutor_fname'];
  $lname = $_POST['tutor_lname']; 
  $email = $_POST['tutor_email'];
  $password = $_POST['tutor_password'];
  $hash_password = password_hash($password,PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_password'];
  $pic = $_FILES['tutor_pic']['name'];
  $pic_tmp = $_FILES['tutor_pic']['tmp_name'];

  $select_query = "select * from `registration` where tutor_fname='$fname' or tutor_email='$email'";
  $query= mysqli_query($con, $select_query);
  $row=mysqli_num_rows($query);

  if($row>0){
      echo  "<script>alert('username or email Exist')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
  }else if($password != $confirm_password){
      echo  "<script>alert('password do not match')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
  }else {
      $insert_query = "INSERT INTO `registration` (tutor_fname, tutor_lname, tutor_email, tutor_pic, tutor_password, confirm_password) VALUES 
      ('$fname','$lname','$email','$pic', '$hash_password', '$hash_password')"; // Added closing parenthesis
      $result = mysqli_query($con, $insert_query);

      /* store the image */
      move_uploaded_file($pic_tmp,"profileimg/$pic");
      echo "<script>alert('User Added')</script>";
  }

  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <link rel="stylesheet" href="sidebar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Auth/registration.css">


    <style>
        .brown-text:hover {
            color: brown !important; /* Override Bootstrap's default text color */
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Move Welcome section to the right -->
    <div class="d-flex flex-row-reverse">
      <?php if(!isset($_SESSION['tutor_fname'])) : ?>
        <a class="nav-link text-light me-3" href="/Auth/login.php"><i class="fa-solid fa-user"></i>Admin  </a>
        <a class="nav-link text-light me-3" href="./Auth/login.php">Login</a>
      <?php else : ?>
        <a class="nav-link text-light me-3" href="profile.php"><i class="fa-solid fa-user"></i>Admin <?php echo $_SESSION['tutor_fname']; ?></a>
        <a class="nav-link text-light me-3" href="logout.php">Logout</a>
      <?php endif; ?>
    </div>
    <!-- Sidebar on the left -->
    <div class="offcanvas offcanvas-start bg-dark " tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title  text-light" id="offcanvasDarkNavbarLabel">OnlineTutors</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
     
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item "><a class="nav-link m-2 " href="index.php?home"><i class="fa-solid fa-gauge  p-1"></i>Dashboard</a></li>
          <li class="nav-item "><a class="nav-link m-2" href="courses.php?courses"><i class="fa-solid fa-graduation-cap  p-1"></i>Courses</a></li>
          <li class="nav-item "><a class="nav-link m-2" href="viewqueries.php?viewqueries"><i class="fa-solid fa-question  p-1"></i>View Queries</a></li>
          <li class="nav-item "><a class="nav-link m-2" href="addcourses.php"><i class="fa-solid fa-graduation-cap p-1"></i>Add Course</a></li>
          <li class="nav-item "><a class="nav-link m-2" href="adduser.php?adduser"><i class="fa-solid fa-user  p-1"></i>Add Users</a></li>
          <!-- <li class="nav-item "><a class="nav-link m-2" href="e.php?profile"><i class="fa-solid fa-user  p-1"></i>Edit  course</a></li> -->
          <li class="nav-item "><a class="nav-link m-2" href="viewusers.php?viewUsers"><i class="fa-solid fa-question  p-1"></i>View users</a></li>
          <!-- <li class="nav-item "><a class="nav-link m-2" href="viewcourse.php?viewcourse"><i class="fa-solid fa-question  p-1"></i>View course</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Add User</h2>
        <fieldset class="row  bg-dark">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">	
                <p class="text">Tutor First Name</p>
                <input type="text" name="tutor_fname" placeholder="Enter Name.." autofocus>
            </label>
            <label for="fullname">	
                <p class="text">Tutor Last  Name</p>
                <input type="text" name="tutor_lname" placeholder="Enter Name..">
            </label>
            <label for="email">
                <p class="text">Email</p>
                <input type="email" placeholder="Enter email" name="tutor_email">
            </label>
            <label for="email">
                <p class="text">Profile</p>
                <input type="file" placeholder="Enter email" name="tutor_pic">
            </label>
            <label for="contact">
                <p class="text">Password</p>
                <input type="password" name="tutor_password" placeholder="Enter contact..">
            </label>
            
            <label for="message">
                <p class="text">Confirm Password</p>
                <input type="password" name="confirm_password" placeholder="Enter specialty">
            </label>
            <button class="btn1 text-light" type="submit" name="adduser">Add user</button>
            <!-- <p>Have an account? <a href="login.php">click here</a></p> -->
        </form>
    </fieldset>
    </div>







<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>