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
        <a class="nav-link text-light me-3" href="login.php"><i class="fa-solid fa-user"></i>Admin  </a>
        <a class="nav-link text-light me-3" href="login.php">Login</a>
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
          <!-- <li class="nav-item "><a class="nav-link m-2" href="viewcourse.php?viewcourse"><i class="fa-solid fa-question  p-1"></i>View course</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="report">
    <h1 class="text-center text-success mt-5">Report</h1>
    <form action="" method="POST">
        <button type="submit" name="generate_report">Generate report</button>
        <button type="submit" name="download_report">Download Report</button>
    </form>
</div>
<?php
// Include the database connection file
include("../connection.php");
session_start();

if (!isset($_SESSION['tutor_fname'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['generate_report'])) {
    // Code to generate the report

    // Start building the report
    $report = "<h2>Generated Report: Entire Database</h2>";

    // Fetch data from each table in the database
    $tables = array("course", "enrolled_course", "inquirer", "registration", "course_reviews");

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $report .= "<h3>$table</h3>";
            $report .= "<table border='1'>";
            $report .= "<tr>";

            // Get column names
            $columns = mysqli_fetch_fields($result);
            foreach ($columns as $column) {
                $report .= "<th>{$column->name}</th>";
            }

            $report .= "</tr>";

            // Fetch and display rows
            while ($row = mysqli_fetch_assoc($result)) {
                $report .= "<tr>";
                foreach ($row as $value) {
                    $report .= "<td>$value</td>";
                }
                $report .= "</tr>";
            }

            $report .= "</table>";
        } else {
            $report .= "<p>No data found in $table</p>";
        }
    }

    // Output the report
    echo $report;

    // You can also save the report to a file or perform any other actions as needed
}

if (isset($_POST['download_report'])) {
    // Code to download the report

    // Start building the report
    $report = "Generated Report: Entire Database\n\n";

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $report .= "$table\n";

            // Get column names
            $columns = mysqli_fetch_fields($result);
            foreach ($columns as $column) {
                $report .= "{$column->name}\t";
            }
            $report .= "\n";

            // Fetch and append rows
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $value) {
                    $report .= "$value\t";
                }
                $report .= "\n";
            }

            $report .= "\n";
        }
    }

    // Output the report as a downloadable file
    header('Content-Disposition: attachment; filename="report.txt"');
    header("Content-Type: text/plain");
    echo $report;
    exit;
}
?>


    



<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>