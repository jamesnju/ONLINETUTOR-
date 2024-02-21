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
    <!-- <link rel="stylesheet" href="course.css"/> -->
    <link rel="stylesheet" href="inqury.css">


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
<div class="container-fluid">
    <div class="inquire d-flex">

        <h2 class="text-center text-success w-100">Inquries Form</h2>
        <fieldset class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fullname">
                <p class="text">Course Name</p>
                <input type="text" name="course_name" placeholder="Enter Name.." autofocus required>
            </label>
            <label for="email">
                <p class="text">course_description</p>
                <input type="text" placeholder="Enter email" name="course_description" required>
            </label>
            <!-- <label for="contact">
                <p class="text">course_status</p>
                <input type="text" name="course_status" placeholder="Enter contact.." required>
            </label> -->
            
            <label for="">
                <p class="text">Name of the tutor</p>
                <select name="tutor_name" id="">
                    <option value="select">select tutor</option>
                    <?php
                    $select_tutor = "select * from `registration`";
                    $result_tutor=mysqli_query($con, $select_tutor);
                while($fetch_data=mysqli_fetch_assoc($result_tutor)){
                    $tutor_id=$fetch_data['tutor_id'];
                    $tutor_fname = $fetch_data['tutor_fname'];
                    echo "<option value='$tutor_id'>$tutor_fname</option>";
                }
                ?>
                </select>
            </label>
            <!-- <label for="">
                <p class="text">Tutor Name</p>
                <input type="text"  name="tutor_name" required>
            </label> -->
        

            <button class="btn1" type="submit" name="addcourse">Submit</button>
            <!-- <p>Have an account? <a href="login.php">click here</a></p> -->
        </form>
    </fieldset>
    </div>
</div>

<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
        // tutor_id	course_name	course_description	course_status	date_created	date_updated
          if(isset($_POST['addcourse'])){
                $course_name = $_POST['course_name'];
                $course_description = $_POST['course_description'];
                $tutor_id = $_POST['tutor_name'];
                $course_status ='Availabele';
                // $order_status=$row_orders['order_status'];
                // if($course_status==='pending'){
                //     $course_status='Unavailable';
                // }else{
                //     $course_status='Available';
                // }
                $select_query = "select * from `course_list` where course_name = '$course_name'";
                $result_select = mysqli_query($con,$select_query);
                $row= mysqli_num_rows($result_select);
                if($row>0){
                    echo "<script>alert('course Already Exists')</script>";
                }else{

                    $insert_query ="insert into `course_list` (tutor_id,course_name,course_description,course_status,date_created,date_updated)
                    VALUES ('$tutor_id','$course_name','$course_description','$course_status',Now(),Now())";
                    $result_insert = mysqli_query($con,$insert_query);
                    echo "<script>alert('course added successfully')</script>";
                }

                

        }


?>