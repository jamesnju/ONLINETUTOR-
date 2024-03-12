<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['tutor_fname'])) {
      // Redirect to the login page
      header("Location: ../Auth/login.php");
      exit();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student enrolled coures</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../course.css"/>

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
        <a class="nav-link text-light me-3" href="./Auth/login.php"><i class="fa-solid fa-user"></i>Welcome Guest</a>
        <a class="nav-link text-light me-3" href="./Auth/login.php">Login</a>
      <?php else : ?>
        <a class="nav-link text-light me-3" href="profile.php"><i class="fa-solid fa-user"></i>Welcome <?php echo $_SESSION['tutor_fname']; ?></a>
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
<div class="container-fluid d-flex content">
    <h2 class=" text-success w-100 text-center col-12">Enrolled Courses</h2>
        <div class="row courses">
        <?php
    $select_enrolled= "select * from `enrolled_course`";
    $enroll_result = mysqli_query($con, $select_enrolled);
    while($fetch_enrollment = mysqli_fetch_assoc($enroll_result)){
    $course_id=$fetch_enrollment['course_id'];
    $course_name = $fetch_enrollment['enrolled_course_name'];
    $course_description = $fetch_enrollment['enrolled_course_description'];
    $tutor_id = $fetch_enrollment['registration_id'];
    $enrollment_status =$fetch_enrollment['enrolled_course_status'];
    $date_enrolled= $fetch_enrollment['enrolled_course_date'];
    
    if($enrollment_status=="Waiting Approval"){
      $enrollment_status="Waiting Approval";
    }else{
      $enrollment_status="Approved";

    }
?>
<div class=" webdesign">
    <h4><?php echo $course_name; ?></h4>
      <p><?php echo $course_description; ?></p>
    <P class="d-flex  gap-2">
      <?php
      if($enrollment_status=='Waiting Approval'){
        echo "<td class='text-success'><h4  class='text-info'>Status:Waiting Aproval</h4></td>";
        }else{
            echo "<td class='bg-secondary text-light'><a  class='text-success  text-decoration-none'><h4  class='text-danger'>Enrolled</h4></a></td>
            </tr>";
        }
      
    ?>
  <!-- <span><a href="enrollment.php?enrollcourse&course_id=<?php echo $course_id; ?>&course_name=<?php echo urlencode($course_name); ?>&course_description=<?php echo urlencode($course_description);?>">Enroll</a></span> -->

  
  </P>
    <P><b>Date Enrolled:</b>    <?php echo $date_enrolled; ?></P>
</div>
<?php
}
?>
        </div>
        <footer class=" bg-dark mt-2">
               <p class="text-light text-center">All rights Reserved &copy; 2024</p>
       </footer>
        

<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
