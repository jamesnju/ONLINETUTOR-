<?php
    include("./connection.php");
    session_start();

    if (!isset($_SESSION['tutor_fname'])) {
      // Redirect to the login page
      header("Location: ./Auth/login.php");
      exit();
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
        <a class="nav-link text-light me-3" href="/Auth/login.php"><i class="fa-solid fa-user"></i>Welcome Guest</a>
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
          <li class="nav-item "><a class="nav-link m-3" href="viewqueries.php?viewqueries"><i class="fa-solid fa-question  p-2"></i>View Queries</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="addcourses.php"><i class="fa-solid fa-graduation-cap p-2"></i>Add Course</a></li>
          <li class="nav-item "><a class="nav-link m-3" href="profile.php?profile"><i class="fa-solid fa-user  p-2"></i>Profile</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="viewqu mt-5 d-flex flex-column">
<h2 class="text-center text-success mt-5">View inquires</h2>

<table class="table table-bordered mt-5 h-100vh  pt-100px">
  <?php
    $select_query = "select * from `inguiry_list`";
    $result= mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
      echo"<h3 class='text-center text-danger mt-5'>No query  sent yet</h3>";

    }else{
      echo  '
      <thead >
      <tr>
          <th class="bg-info">inquiry_id</th>
          <th class="bg-info">tutor_id</th>
          <th class="bg-info">full_name</th>
          <th class="bg-info">inqurer_email</th>
          <th class="bg-info">inquirer_contact</th>
          <th class="bg-info">message	</th>
          <th class="bg-info">date_created</th>
      </tr>
      </thead>
      ';
    }



?>

       
            <tbody>
                <?php
                  
                    while($row_fetch=mysqli_fetch_assoc($result)){
                    $inquiry_id	= $row_fetch['inquiry_id'];
                    $tutor_id= $row_fetch['tutor_id'];
                    $full_name= $row_fetch['full_name'];
                    $inqurer_email	= $row_fetch['inqurer_email'];
                    $inquirer_contact	= $row_fetch['inquirer_contact'];
                    $message= $row_fetch['message'];
                    $date_created= $row_fetch['date_created'];
                    ?>
            <tr class="text-center">
                <td class="bg-secondary text-light"><?php echo $inquiry_id ?></td>
                <td class="bg-secondary text-light"><?php echo $tutor_id?></td>
                <td class="bg-secondary text-light"><?php echo $full_name?></td>
                <td class="bg-secondary text-light"><?php echo $inqurer_email?></td>
                <td class="bg-secondary text-light"><?php echo $inquirer_contact?></td>
                <td class="bg-secondary text-light"><?php echo $message?></td>
                <td class="bg-secondary text-light"><?php echo $date_created?></td>
                </tr>
                        <?php
                    }
                        ?>

            </tbody>
                    
</table> 
</div>    
   
<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

