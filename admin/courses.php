<?php
    include("../connection.php");
    session_start();

    if (!isset($_SESSION['tutor_fname'])) {
      // Redirect to the login page
      header("Location: login.php");
      exit();
  }

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
        <a class="nav-link text-light me-3" href="/Auth/login.php"><i class="fa-solid fa-user"></i>Admin  </a>
        <a class="nav-link text-light me-3" href="./Auth/login.php">Login</a>
      <?php else : ?>
        <a class="nav-link text-light me-3" href="#"><i class="fa-solid fa-user"></i>Admin <?php echo $_SESSION['tutor_fname']; ?></a>
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
          <li class="nav-item "><a class="nav-link m-2" href="report.php?report"><i class="fa-regular fa-file-pdf p-1"></i>Generate Report</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid d-flex content">
    <h2 class=" text-success w-100 text-center col-12">Availabel Courses</h2>
        <div class="row courses">
        <?php
    $select_course= "select * from `course`";
    $course_result = mysqli_query($con, $select_course);
    $count=mysqli_num_rows($course_result);
    if($count==0){
      echo  "<h3 class='text-center text-danger mt-5'>No courses yet</h3>";

    }else{
    while($fetch_course = mysqli_fetch_assoc($course_result)){
    $course_id=$fetch_course['course_id'];
    $course_name = $fetch_course['course_name'];
    $course_description = $fetch_course['course_description'];
    $tutor_id = $fetch_course['registration_id'];
    $course_status =$fetch_course['course_status'];
    $date_created= $fetch_course['course_date_created'];
    $date_updated=$fetch_course['course_date_updated'];
      if($course_status==='pending'){
          $course_status='Inactive';
      }else{
          $course_status='Active';
      }
?>
<div class=" webdesign">
    <h4><?php echo $course_name; ?></h4>
      <p><?php echo $course_description; ?></p>
    <P class="d-flex  gap-2">
      <?php
      if($course_status=='Active'){
        echo "<td class='text-success'><h4  class='text-success'>Active</h4></td>";
        }else{
            echo "<td class='bg-secondary text-light'><a href='confirm.php?course_id=$course_id' class='text-danger'><h4  class='text-danger'>Inctive</h4></a></td>
            </tr>";
        }
      
    ?>
  
  </P>
    <P><b>Date Created:</b>    <?php echo $date_created; ?></P>
    <P><b>Date Updated: </b>   <?php echo $date_updated; ?></P>
    <a href='Sidebar.php?editcourse=<?php echo $course_id; ?>' class='text-dark'> <i class='fa-solid fa-pen-to-square'>Edit</i> </a>
    <a href='Sidebar.php?deletecourse=<?php echo $course_id; ?>' class='text-dark'><i class='fa-solid fa-trash'>Delete</i></a>
</div>
<?php
}}
?>
        </div>
        <footer class=" bg-dark">
               <p class="text-light text-center">All rights Reserved &copy; 2024</p>
       </footer>
        

<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
