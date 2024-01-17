<?php
require 'config/database.php';



if(isset($_POST['submit'])) {
    //get form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dept = filter_var($_POST['dept'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $insert_student_query = "INSERT INTO students (Name,department) 
        VALUES ('$name','$dept')";
    $insert_student_result = mysqli_query($connection, $insert_student_query);
    if (!mysqli_errno($connection)) {

        header('location:' . ROOT_URL . 'inputsalaries.php');
        die();
    }
}


