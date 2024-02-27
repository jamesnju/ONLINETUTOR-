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
    <title>sidebar</title>
    <link rel="stylesheet" href="sidebar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .brown-text:hover {
            color: brown !important; /* Override Bootstrap's default text color */
        }
        .tutorimage{
            width: 2rem;
            object-fit: cover;
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
<h3 class="text-center text-success mt-5    pt-5">All users</h3>
<table class="table table-bordered mt-5">
    <thead >

    <?php
        $slect_query="select * from `registration`";
        $result_orders=mysqli_query($con,$slect_query);
        $row_count=mysqli_num_rows($result_orders);
        

        if($row_count==0){
            echo"<h3 class='text-center text-danger mt-5'>No users yet</h3>";
        }else{
            echo" <tr>
        <th class='bg-info text-center'>SI no</th>
        <th class='bg-info text-center'>Tutor fname</th>
        <th class='bg-info text-center'>Tutor lname</th>
        <th class='bg-info text-center'>Tutor email</th>
        <th class='bg-info text-center'>tutot Image</th>
        <th class='bg-info text-center'>Delete</th>
        </tr>
        </thead >";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $user_id=$row_data['tutor_id'];
                $username=$row_data['tutor_fname'];
                $usersecondname=$row_data['tutor_lname'];
                $user_email=$row_data['tutor_email'];
                $user_image=$row_data['tutor_pic'];
            
              
                $number++;

            ?>

                <tbody class='bg-secondary text-light'>
                <tr class="bg-secondary text-light" >
                    <td class="bg-secondary text-light "><?php echo $number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $username; ?></td>
                    <td class="bg-secondary text-light "><?php echo $usersecondname ?></td>
                    <td class="bg-secondary text-light "><?php echo $user_email; ?></td>
                    <td class="bg-secondary text-light "><img class="tutorimage" src="../image/<?php echo $user_image; ?>"></td>

                    <td class="bg-secondary text-light">
                    <a href='Sidebar.php?delete_users=<?php echo $user_id; ?>'
                    type="button" class=" text-light" >
                    <i class='fa-solid fa-trash'></i></a></td>
                
                </tr>
            </tbody>
            <?php
            }
        }


    ?>
       
    
</table>



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>