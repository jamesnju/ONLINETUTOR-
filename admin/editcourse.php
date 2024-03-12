<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['tutor_fname'])) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }

    //fetch

    if(isset($_GET['editcourse'])){
        $edit_id=$_GET['editcourse'];

        $select_course= "select *  from `course`";
        $course_result=mysqli_query($con,$select_course);
        while($course_data=mysqli_fetch_assoc($course_result)){

            $course_name = $course_data['course_name'];
            $course_description = $course_data['course_description'];
            $tutor_id = $course_data['registration_id'];
            $course_status ='pending';
        }
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
    <!-- <link rel="stylesheet" href="course.css"/> -->
    <link rel="stylesheet" href="../inqury.css">


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
<div class="container-fluid">
    <div class="inquire d-flex">
        <h2 class="text-center text-success w-100">Add  Courses</h2>
        <fieldset class="row bg-dark">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">
                <p class="text">Course Name</p>
                <input type="text" name="course_name"   value="<?php echo $course_name;?>" placeholder="Enter Name.." autofocus required>
            </label>
            <label for="descripion">
                <p class="text">Course  Description</p>
                <!-- <input type="text" placeholder="Enter email" name="course_description" required> -->
                <textarea name="course_description" id=""  value="<?php echo $course_description;?>" cols="60" rows="10" maxlength="500"  placeholder="Max length of 500 word...." required><?php echo $course_description;?></textarea>
            </label>
    
            
            <label for="">
                <p class="text">Name of The Tutor</p>
                <select name="tutor_name" id="">
                    <option value="<?php echo $tutor_id;?>"><?php echo $tutor_id;?></option>
                    
                </select>
            </label>
            <!-- <label for="">
                <p class="text">Tutor Name</p>
                <input type="text"  name="tutor_name" required>
            </label> -->
        

            <button class="btn1" type="submit" name="edit">Update Course</button>
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
<?php
          if(isset($_POST['edit'])){
                $course_name = $_POST['course_name'];
                $course_description = $_POST['course_description'];
                $tutor_id = $_POST['tutor_name'];
                $course_status ='pending';
               
                $update_sql = "UPDATE `course` SET course_name='$course_name', course_description='$course_description',
            registration_id='$tutor_id'  WHERE course_id=$edit_id";
                $result_update = mysqli_query($con,$update_sql);
                if($result_update){
                    echo  "<script>alert('course updated')</script>";
                    echo  "<script>window.open('courses.php','_self')</script>";
                }
        }


?>