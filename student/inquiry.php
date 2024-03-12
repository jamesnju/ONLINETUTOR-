<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['tutor_fname'])) {
      // Redirect to the login page
      header("Location: ../Auth/login.php");
      exit();
  }

    if(isset($_POST['request'])){
        $username = $_POST['full_name'];
        $email = $_POST['inqurer_email'];
        $contact = $_POST['inquirer_contact'];
        $message = $_POST['message'];
        $tutor_id = $_POST['tutor_name'];


        $query_check  =  "select * from `inquirer` where inquirer_email='$email'";
        $reult_check  = mysqli_query($con, $query_check);
        $row_count = mysqli_num_rows($reult_check);
        if($row_count>0){
            echo "<script>alert('inquiry Already submitted')</script>";
        }else{

        $insert_query = "insert into `inquirer` (registration_id,inquirer_full_name,inquirer_email,inquirer_contact,inquirer_message,inquirer_date_created) VALUES 
        ('$tutor_id','$username','$email','$contact','$message',Now())";
        $result_insert=mysqli_query($con, $insert_query);
        echo "<script>alert('inquiry submitted successfuly')</script>";
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student inquiry from</title>
    <link rel="stylesheet" href="inqury.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../inqury.css"/>


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
        <a class="nav-link text-light me-5" href="./Auth/login.php"><i class="fa-solid fa-user"></i>Welcome Guest</a>
        <a class="nav-link text-light me-5" href="./Auth/login.php">Login</a>
      <?php else : ?>
        <a class="nav-link text-light me-5" href="profile.php"><i class="fa-solid fa-user"></i>Welcome <?php echo $_SESSION['tutor_fname']; ?></a>
        <a class="nav-link text-light me-5" href="logout.php">Logout</a>
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
          <li class="nav-item "><a class="nav-link m-3 " href="index.php?home"><i class="fa-solid fa-gauge  p-2"></i>Dashboard</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="courses.php?courses"><i class="fa-solid fa-graduation-cap  p-2"></i>Courses</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="inquiry.php?inquiry"><i class="fa-solid fa-question  p-2"></i>Queries</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="viewenrolledcourses.php?viewenrolledcourse"><i class="fa-solid fa-graduation-cap p-2"></i>Enrolled Course</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="profile.php?profile"><i class="fa-solid fa-user  p-2"></i>Profile</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Student Inquries Form</h2>
        <fieldset class="row  bg-dark">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">
                <p class="text">Full Name</p>
                <input type="text" name="full_name" placeholder="Enter Name.." autofocus required>
            </label>
            <label for="email">
                <p class="text">Email</p>
                <input type="email" placeholder="Enter email" name="inqurer_email" required>
            </label>
            <label for="contact">
                <p class="text">Contact</p>
                <input type="tel" name="inquirer_contact" placeholder="Enter contact.." required>
            </label>
            
            <label for="message">
                <p class="text">Message</p>
                <input type="text" name="message" placeholder="Enter message.." required>
            </label>
            <label for="">

                <p class="text">Name of The Tutor</p>
                <select name="tutor_name" id="">
                <option value='select'>select tutor</option>;
                    <?php
                    $select_tutor = "select * from `registration` where registration_role='tutor'";
                    $result_tutor=mysqli_query($con, $select_tutor);
                while($fetch_data=mysqli_fetch_assoc($result_tutor)){
                    $tutor_id=$fetch_data['registration_id'];
                    $tutor_fname = $fetch_data['registration_fname'];
                    echo "<option value='$tutor_id'>$tutor_fname</option>";
                }
                ?>
                </select>
            </label>
            <!-- <label for="">
                <p class="text">Tutor Name</p>
                <input type="text"  name="tutor_name" required>
            </label> -->
        

            <button class="btn1" type="submit" name="request">Submit</button>
            <!-- <p>Have an account? <a href="login.php">click here</a></p> -->
        </form>
    </fieldset>
    </div>
</div>
<footer class=" bg-dark">
        <p class="text-light text-center">All rights Reserved &copy; 2024</p>
  </footer>



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>