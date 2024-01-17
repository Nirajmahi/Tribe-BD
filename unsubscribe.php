<?php
require 'config/database.php';
$email = $_POST['email'];

$query = " DELETE FROM newsletter WHERE email='$email'";

$result = mysqli_query($connection, $query);
setcookie('subscribed','',-30);
setcookie('subscribed','2',time()+360000);
 die();

echo "You have been successfully unsubscribed";


