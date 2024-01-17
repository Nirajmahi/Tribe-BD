<?php
require 'config/database.php';



if(isset($_POST['submit'])) {
    //get form data
    $salary_id = filter_var($_POST['salary-id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $amount = filter_var($_POST['amount'],FILTER_SANITIZE_NUMBER_INT);
    $student_id =  filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $insert_salary_query = "INSERT INTO salary (id ,amount,students) 
        VALUES ('$student_id',$amount,$student_id)";
    $insert_salary_result = mysqli_query($connection, $insert_salary_query);
    if (!mysqli_errno($connection)) {

        header('location:' . ROOT_URL . 'avg.php');
        die();
    }
}



