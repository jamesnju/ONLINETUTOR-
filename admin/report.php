<?php
require('../connection.php');

$cityName = 'Nairobi';

if(isset($_POST['generate_report'])) {
    require('./fpdf186/fpdf.php'); // Include the FPDF library
    ob_start(); // Start output buffering

    // Extend FPDF class for custom header and footer
    class PDF extends FPDF {
        // Page header
        function Header() {
            // Select Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(30,10,'Report',0,0,'C');
            // Line break
            $this->Ln(20);

            // Add Date, Day, Time, and City
            $this->SetFont('Arial','',12);

            // Drawing a rectangle around the text
            $this->Rect(130, 29, 70, 40, 'D'); // Enclosing box

            $this->Cell(0, 10, date('F j, Y'), 0, 1, 'R'); // Date
            $this->Cell(0, 10, date('l'), 0, 1, 'R'); // Day
            $this->Cell(0, 10, date('h:i A'), 0, 1, 'R'); // Time
            $this->Cell(0, 10, $GLOBALS['cityName'], 0, 1, 'R'); // City
        }

        // Page footer
        function Footer() {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

            // Disable automatic page break
            $this->SetAutoPageBreak(false);
        }
    }

    // Create a new PDF instance
    $pdf = new PDF();
    $pdf->AliasNbPages(); // Enable page numbering

    // Add a page
    $pdf->AddPage();

    // Content
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Generated Report for TutorOnline Web App',0,1); // Title

    // Fetch data from each table in the database
    $tables = array("course", "enrolled_course", "inquirer", "registration");
    foreach ($tables as $table) {
        $pdf->Ln(10); // Add some space between tables
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,10,$table,0,1); // Table name
        $pdf->SetFont('Arial','',10);

        // Fetch data
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Get column names
            $columns = mysqli_fetch_fields($result);
            foreach ($columns as $column) {
                $pdf->Cell(40,7,$column->name,1);
            }
            $pdf->Ln();

            // Fetch and display rows
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $value) {
                    $pdf->Cell(40,7,$value,1);
                }
                $pdf->Ln();
            }
        } else {
            $pdf->Cell(0,10,'No data found in '.$table,0,1);
        }
    }

    // Output the PDF
    $pdf->Output("report.pdf", "I"); // "I" parameter to display inline
    exit; // Exit to prevent further HTML output
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
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


<div class="report">
    <h1 class="text-center text-success mt-5" class='text-center p-5'>Report</h1>
    <form action="" method="POST">
        <button type="submit" name="generate_report" class="btn btn-info justify-center m-5 ">Download report</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
