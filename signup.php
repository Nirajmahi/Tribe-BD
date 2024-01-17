
<?php

require 'config/constants.php';


//get back form data if there was a registration error;
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

//delete signup data
unset($_SESSION['signup-data']);



?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=" X-UA-Compatible"  content="IE-edge">
    <meta  name="viewport"  content="width=device-width,initial-scale=1.0">
    <title> Responsive multipage blog website</title>
    <!--custom stylesheet-->
    <link rel="stylesheet" href=" css/style.css">
    <!--custom icon-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,600;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
<section class="form_section">
    <div class="container form_section-container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])) : ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
        </div>
        <?php endif?>
        <form action="<?=ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST"> <!--file uploadtowork -->
            <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
            <input type="text" name="lastname"value="<?= $lastname?>" placeholder="Lasr Name">
            <input type="text" name="username" value="<?= $username?>" placeholder="UserName">
            <input type="email" name="email" value="<?= $email?>" placeholder="Email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create a password">
            <input type="password" name="confirmpassword"value="<?= $confirmpassword ?>" placeholder="Confirm Password">
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">

            </div>
            <button type="submit" name="submit" class="btn" style="background-color: #FFDB58">Sign Up</button>
            <small style="color: #5854c7" >Already hav an account? <a href="signin.php" style="color: #FFDB58">Sign in</a></small>
        </form>
    </div>
</section>
</body>
