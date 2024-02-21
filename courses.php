<?php
    include("./connection.php");
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coures</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="course.css"/>

</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
     
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          
          
          <li><a class="nav-link" href="index.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a class="nav-link" href="courses.php?courses"><i class="fa-solid fa-graduation-cap"></i>Courses</a></li>
            <li><a class="nav-link" href="inquiry.php?inquiry"><i class="fa-solid fa-question"></i>Inquries</a></li>
            <li><a class="nav-link" href="profile.php?profile"><i class="fa-solid fa-user"></i>Profile</a></li>
            <!-- <li><a class="nav-link" href="./Auth/registration.php?register"><i class="fa-solid fa-user"></i>
              
            register
          </a></li> -->
          <?php 
        //displays username if logged in
        if(!isset($_SESSION['tutor_fname'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-user"></i>Welcome Guest</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-user"></i>Welcome '.$_SESSION['tutor_fname'].'</a>
        </li>';
        }
      ?>
        <?php 
          if(!isset($_SESSION['tutor_fname'])){
            echo '<li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>';
          }
        ?>
        </ul>
      
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid d-flex content">
    <h2 class=" text-success w-100 text-center col-12">Availabel Courses</h2>
        <div class="row courses">
        <?php
$select_course= "select * from `course_list`";
$course_result = mysqli_query($con, $select_course);
while($fetch_course = mysqli_fetch_assoc($course_result)){
    $course_name = $fetch_course['course_name'];
    $course_description = $fetch_course['course_description'];
    $tutor_id = $fetch_course['tutor_id'];
    $course_status ='Unavailable';
?>
<div class=" webdesign">
    <h4><?php echo $course_name; ?></h4>
    <p><?php echo $course_description; ?></p>
    <P class="text-success"><?php echo $course_status; ?></P>
    <P>DATE CREATED</P>
    <P>DATE MODIFIED</P>
</div>
<?php
}
?>
        <?php include('./footer.php'); ?>

<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
