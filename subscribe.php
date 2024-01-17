<?php
require 'config/database.php';

if(isset($_POST['submit']))
{
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];


            $subscribed = 1;




}



$query = "SELECT email FROM newsletter where email='$email'";
$result = mysqli_query($connection,$query);

if ($result->num_rows > 0) {
    echo 'This email has been already subscribed. ';
} else {
    $query = "INSERT INTO newsletter (first_name, last_name, email,subscribed) VALUES ('$first_name','$last_name','$email',$subscribed)";
    mysqli_query($connection,$query);
    setcookie('subscribed',$subscribed,time()+36000);
    die();
    echo 'You have been successfully added.';
    header('location:','<?php ROOT_URL ?>index.php');
}


