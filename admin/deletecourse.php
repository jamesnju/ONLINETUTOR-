<?php 

    if(isset($_GET['deletecourse'])){
        $delete_id=$_GET['deletecourse'];

        $delete_query="delete from `course_list` where course_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('course deleted')</script>";
            echo"<script>window.open('courses.php','_self')</script>";
        }
    }

?>