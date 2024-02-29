<?php
    include("../connection.php");
    session_start();

    // Check if the user is logged in if  redirects him to  login page
    if (!isset($_SESSION['tutor_fname'])) {
        // Redirect to the login page
        header("Location: ../Auth/login.php");
        exit();
    }

?>
<?php
   $query = "SELECT COUNT(*) AS enrolled_course FROM enrolled_courses"; // Change 'users' to your actual table name
   $result = mysqli_query($con, $query);

   if (!$result) {
       // Handle query error
       die("Query failed: " . mysqli_error($con));
   }
   // Step 3: Fetch the result and display it on the dashboard
   $row = mysqli_fetch_assoc($result);
   $enrolledcourses = $row['enrolled_course'];
   // Display the total number of users on the dashboard
   echo $enrolledcourses;
?>
<?php
   $query = "SELECT COUNT(*) AS total_courses FROM course_list"; // Change 'users' to your actual table name
   $result = mysqli_query($con, $query);

   if (!$result) {
       // Handle query error
       die("Query failed: " . mysqli_error($con));
   }
   // Step 3: Fetch the result and display it on the dashboard
   $row = mysqli_fetch_assoc($result);
   $totalcourses = $row['total_courses'];
   // Display the total number of users on the dashboard
   echo  $totalcourses;




   // Query to count approved courses
   $approvedQuery = "SELECT COUNT(*) AS approved_courses FROM enrolled_courses WHERE enrollment_status = 'Approved'";
   $approveResult = mysqli_query($con, $approvedQuery);

   if (!$approveResult) {
       // Handle query error
       die("Query failed: " . mysqli_error($con));
   }

   // Fetch the result for waiting  approval courses
   $approvedRow = mysqli_fetch_assoc($approveResult);
   $approvedCourses = $approvedRow['approved_courses'];

   // Query to count unavailable courses
   $waitingapprovalQuery = "SELECT COUNT(*) AS waiting_approval FROM enrolled_courses WHERE enrollment_status = 'Waiting Approval'";
   $waitingResult = mysqli_query($con, $waitingapprovalQuery);

   if (!$waitingResult) {
       // Handle query error
       die("Query failed: " . mysqli_error($con));
   }

   // Fetch the result for unavailable courses
   $waitingRow = mysqli_fetch_assoc($waitingResult);
   $waitingCourses = $waitingRow['waiting_approval'];
?>



    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Dashboard</title>
    <link rel="stylesheet" href="../home.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        <a class="nav-link text-light me-5" href="/Auth/login.php"><i class="fa-solid fa-user"></i>Welcome Guest</a>
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
<div class="container-fluid home">
  <div class="main">
    <h2 class="text-center text-dark w-100  text-decoration-underline">Student Dashboard</h2>
    <div class="dashboard bg-dark">
      <p>Approved Courses</p>
      <h1><?php echo $approvedCourses; ?></h1>
    </div>
    <div class="dashboard bg-dark">
      <p>Waiting Approval</p>
      <h1><?php echo $waitingCourses; ?></h1>
    </div>
    <div class="dashboard bg-dark">
      <p>Enrolled courses</p>
      <h1><?php echo $enrolledcourses ?></h1>
    </div>
    <div class="dashboard bg-dark">
      <p>Total Courses</p>
      <h1><?php echo  $totalcourses;?></h1>
    </div>
  </div>
  <div class="img m-auto">

  </div>
   
</div>
<footer class=" bg-dark">
        <p class="text-light text-center">All rights Reserved &copy; 2024</p>
</footer>



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
