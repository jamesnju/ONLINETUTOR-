<?php 

    if(isset($_GET['deleteinqury'])){
        $delete_id=$_GET['deleteinqury'];
        $delete_query="delete from `inquirer` where inquirer_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('inquery deleted')</script>";
            echo"<script>window.open('viewqueries.php','_self')</script>";
        }
    }

?>