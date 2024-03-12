<?php
    include("./connection.php");
    session_start();


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
    <title>inquiry</title>
    <link rel="stylesheet" href="inqury.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navigation">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">OnlineTutor</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Leave the links here -->
      </ul>
    </div>
    
    <!-- Container for links with justify-content-end -->
    <div class="d-flex justify-content-end">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="landing.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./about.php">About Us</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link text-light" href="./inquiry.php">Inquire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./Auth/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./Auth/registration.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav><div class="container-fluid">
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