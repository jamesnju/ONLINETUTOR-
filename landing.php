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
          <a class="nav-link text-light" href="#about">About Us</a>
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
</nav>

<div class="landing">
  <div class="content1">
  <h2 class="text-info">Who we are and what we do</h2>
    <p>Our tutors are teachers, professors, adjuncts, PhD students, and industry professionals who are all passionate about their areas of expertise and eager to help students learn.
    We help learners of all ages and stages—from kindergarten through college, continuing education, and career. Our tutors provide empowering, encouraging support to help students complete their assignments, improve their grades, and persist in their studies. Every day, thousands of students share positive feedback about their online tutoring experiences.
    Our online tutoring platform makes connecting with students (and earning extra income!) simple, convenient, and flexible.
    <div class="content2">
      <span><a href="">WELCOME</a></span>
      <span><a href="./Auth/registration.php">Register</a></span>
    </div>
  </div>

</div>

<div class="about"  id="about">
  <h2 class="text-success text-center">About Us</h2>
    <div class="believe">
    <h4 class="text-info">Our Beliefs</h4>
At Tutor.com, we believe that every student deserves a personal tutor, and we are dedicated to promoting equity, opportunity, and achievement for all learners. To that end, we partner with colleges and universities, K–12 schools and districts, public and state libraries, employee benefits programs, and the U.S. military to provide 24/7, on-demand, individualized tutoring and homework help in more than 250 subjects.

Our mission is to instill hope, advance equity, and catalyze achievement in schools and communities. We do this by providing encouraging, empowering, and effective academic and professional support for learners of all ages and stages—from kindergarten through college, graduate school, career, and continuing education.

Over more than two decades of supporting students, educators, school leaders, and families, we have helped institutions increase student pass and persistence rates, and learners become more confident in their schoolwork. Our learner satisfaction rates remain consistently high: 97 percent of post-session survey respondents would recommend Tutor.com to a friend, and 98 percent are glad their institution offers Tutor.com. The feeling is mutual. We are honored to partner with institutions and organizations to help them scale the human connection and provide individualized support—anytime, anywhere.
    </div>
    <div class="believe">
        <h4 class="text-info">Our Story</h4>
        In 1998, a small group of passionate education and tech professionals had a terrific URL and a big idea—use the Internet to connect students to tutors whenever and wherever they needed help. So, they recruited about a hundred tutors and created one of the first online, interactive classrooms.
        In 2000, Tutor.com, Inc. was incorporated and began partnering with institutions to ensure that students from all socioeconomic backgrounds would have access to highly effective 1-to-1 tutoring and homework help, day or night, from any Internet-enabled device.
        In 2014, Tutor.com acquired The Princeton Review®, a world leader in education services, and added The Princeton Review test preparation services to its online tutoring platform and offerings.
        Today, we work with thousands of educational institutions and education-forward organizations, as well as the U.S. Department of Defense and Coast Guard Mutual Assistance, to deliver nearly two million tutoring, homework help, and test preparation sessions per year.
    </div>
    <div class="believe">
        <h4 class="text-info">Our Tutors</h4>
        Each year, Tutor.com receives more than 100,000 applications from prospective tutors. Every applicant is rigorously tested and vetted. Applicants must demonstrate their subject-matter expertise, effective tutoring methodology, mastery of our online environment, and understanding of Tutor.com’s pedagogy and policies. Those able to satisfy the arduous application process must also pass a thorough third-party background check. On average, just 1.2 percent of those who begin the process are ultimately onboarded as Tutor.com tutors. Through our supportive quality-assurance program, Tutor.com ensures that our tutors consistently provide highly effective, customized, and engaging instruction and support.
    </div>
    <div class="believe">
        <h4 class="text-info">Our Commitment to Accessibility</h4>
        Tutor.com is an equity solution, and we are dedicated to ensuring that all students may access and benefit from the service. Tutor.com follows all ADA guidelines for accessibility and is ADA- and Section 508–compliant.
        To accommodate learning for physically challenged learners, we offer an accessible platform with a range of options, including chat and audio tutoring for hearing-impaired users. Sight-challenged learners can use our online classroom, where chat, file-sharing, and other tools are fully keyboard-operable and tab-navigable. The online classroom is also optimized for popular screen readers (e.g., JAWS, Kurzweil, NVDA, etc.), providing text equivalents for all non-text content. It includes all relevant page elements in the tab order so their proper reading sequence may be programmatically determined. The online classroom is further designed with motor disabilities in mind. Because our service is entirely web-based, with no required plugins or downloads, it does not interfere with third-party assistive technology or native OS accessibility functions like mouse keys, sticky keys, filter keys, or toggle keys. In addition to providing an accessible platform, we equip our tutors with specialized instructional techniques for a range of student learning needs.
    </div>
</div>
<footer class=" bg-dark">
        <p class="text-light text-center">All rights Reserved &copy; 2024</p>
  </footer>



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>