<?php
   @session_start();
    include("./connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="landing.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Auth/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">About Us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./Auth/login.php">Service</a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="./inquiry.php">inquire</a>
        </li>
    </ul>
    </div>
  </div>
</nav>
<div class="landing">
  <div class="content1">
  <h2 class="text-info">Who we are and what we do</h2>
<p>Our tutors are teachers, professors, adjuncts, PhD students, and industry professionals who are all passionate about their areas of expertise and eager to help students learn.
We help learners of all ages and stages—from kindergarten through college, continuing education, and career. Our tutors provide empowering, encouraging support to help students complete their assignments, improve their grades, and persist in their studies. Every day, thousands of students share positive feedback about their online tutoring experiences.
Our online tutoring platform makes connecting with students (and earning extra income!) simple, convenient, and flexible.
  </div>

</div>



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>