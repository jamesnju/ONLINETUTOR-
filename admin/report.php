<?php
require('../connection.php');

$cityName = 'Nairobi';

// Function to get column names for a table excluding specified fields
function getColumnNames($table, $con) {
    $fields = mysqli_query($con, "SHOW COLUMNS FROM $table");
    $columns = [];
    while ($field = mysqli_fetch_assoc($fields)) {
        // Exclude specified fields and primary key columns
        if (!in_array($field['Field'], getExcludedFields($table)) && strpos($field['Key'], 'PRI') !== 0) {
            $columns[] = $field['Field'];
        }
    }
    return $columns;
}

// Function to get excluded fields based on the table name
function getExcludedFields($table) {
    $excludedFields = [];

    switch ($table) {
        case 'registration':
            $excludedFields = ['registration_password', 'registration_pic', 'registration_confirm_password'];
            break;
        case 'inquirer':
            $excludedFields = ['registration_id'];
            break;
        case 'enrolled_course':
            $excludedFields = ['course_id', 'registration_id'];
            break;
        case 'course':
            $excludedFields = ['registration_id'];
            break;
        default:
            break;
    }

    return $excludedFields;
}

// Generate and download PDF report
if(isset($_POST['generate_report'])) {
    require('./fpdf186/fpdf.php'); // Include the FPDF library
    ob_start(); // Start output buffering

    // Extend FPDF class for custom header and footer
    class PDF extends FPDF {
        // Page header
        function Header() {
            $this->SetFont('Arial','B',15);
            $this->Cell(0,10,'Report',0,1,'C');
            $this->Ln(10); // Add space
        }
        
        // Page footer
        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    // Create a new PDF instance
    $pdf = new PDF();
    $pdf->AliasNbPages(); // Enable page numbering
    $pdf->AddPage();

    // Content
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Generated Report for TutorOnline Web App',0,1,'C'); // Centered title
    $pdf->Ln(10); // Add space

    // Fetch data from each table in the database
    $tables = array("course", "enrolled_course", "inquirer", "registration");
    foreach ($tables as $table) {
        // Get column names for the table excluding specified fields
        $columns = getColumnNames($table, $con);
        $query = "SELECT " . implode(", ", $columns) . " FROM $table";
        
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,10,$table,0,1,'C'); // Centered table name
            $pdf->SetFont('Arial','',10);

            // Write column names
            foreach ($columns as $column) {
                $pdf->Cell(37, 7, $column, 1);
            }
            $pdf->Ln();

            // Fetch and display rows
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($columns as $column) {
                    $pdf->Cell(37,7,$row[$column],1);
                }
                $pdf->Ln();
            }
            $pdf->Ln(10); // Add space between tables
        } else {
            $pdf->Cell(0,10,'No data found in '.$table,0,1);
        }
    }

    // Output the PDF
    $pdf->Output("report.pdf", "I"); // "I" parameter to display inline
    exit;
}

// Generate and download CSV report
if(isset($_POST['generate_csv'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=report.csv');

    $output = fopen('php://output', 'w');

    // Fetch data from each table in the database
    $tables = array("course", "enrolled_course", "inquirer", "registration");
    foreach ($tables as $table) {
        // Get column names for the table excluding specified fields
        $columns = getColumnNames($table, $con);
        $query = "SELECT " . implode(", ", $columns) . " FROM $table";
        
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Write CSV header
            fputcsv($output, $columns);

            // Write CSV rows
            while ($row = mysqli_fetch_assoc($result)) {
                fputcsv($output, $row);
            }
        }
    }

    fclose($output);
    exit;
}

// Generate and download HTML report
if(isset($_POST['generate_html'])) {
    header('Content-Type: text/html; charset=utf-8');
    header('Content-Disposition: attachment; filename=report.html');

    ob_start();

    // Output HTML content
    echo '<html>';
    echo '<head><title>Report</title></head>';
    echo '<body>';
    echo '<h1 style="text-align: center;">Generated Report for TutorOnline Web App</h1>';
    
    // Fetch data from each table in the database
    $tables = array("course", "enrolled_course", "inquirer", "registration");
    foreach ($tables as $table) {
        echo '<h2 style="text-align: center;">'.$table.'</h2>';
        echo '<table border="1" style="margin: 0 auto;">'; // Centered table with margin
        
        // Get column names for the table excluding specified fields
        $columns = getColumnNames($table, $con);

        // Write HTML table header
        echo '<tr>';
        foreach ($columns as $column) {
            echo '<th>'.$column.'</th>';
        }
        echo '</tr>';

        // Fetch data
        $query = "SELECT " . implode(", ", $columns) . " FROM $table";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Write HTML table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                foreach ($columns as $column) {
                    echo '<td>'.$row[$column].'</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="'.count($columns).'">No data found in '.$table.'</td></tr>';
        }

        echo '</table>';
    }

    echo '</body>';
    echo '</html>';

    $htmlContent = ob_get_clean();
    echo $htmlContent;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="report">
    <h1 class="text-center text-success mt-5">Report</h1>
    <form action="" method="POST">
        <button type="submit" name="generate_report" class="btn btn-info justify-center m-5">Download PDF</button>
        <button type="submit" name="generate_csv" class="btn btn-primary justify-center m-5">Download CSV</button>
        <button type="submit" name="generate_html" class="btn btn-warning justify-center m-5">Download HTML</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
