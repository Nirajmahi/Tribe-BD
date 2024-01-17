<?php
require 'config/database.php';
$avarage_salary = "Select  avg(amount) from salaries";
$avarage_salary_query = mysqli_query($connection,$avarage_salary);
$avarage_salary_query_result = mysqli_fetch_assoc($avarage_salary_query);
echo $avarage_salary_query_result;
