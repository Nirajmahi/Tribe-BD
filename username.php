<?php

require 'config/constants.php';
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
if(isset($_POST['username_email']))
{
    echo $_POST['username_email'];
    echo $_POST['password'];
    echo $_POST['check'];
}







?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="UTF-8">
    <meta http-equiv=" X-UA-Compatible"  content="IE-edge">
    <meta  name="viewport"  content="width=device-width,initial-scale=1.0">
    <title> Responsive multipage blog website</title>
    <!--custom stylesheet-->
    <link rel="stylesheet" href="css/style.css" <?php echo time()?>
    <!--custom icon-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,600;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <style>
        .text1{
            color: #5854c7;
        }
    </style>
</head>
<body>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Sign Up</h2>
        <?php

        echo $_COOKIE['check1'];
        echo "hi";

        ?>
        <?php if(isset($_SESSION['signup-success'])) : ?>

            <div class="alert_message success">
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>

            </div>
        <?php elseif (isset($_SESSION['signin'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin']);
                    ?>
                </p>

            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>j.php" enctype="multipart/form-data" method="post">

            <input type="email" name="username_email" value=" " placeholder="Email" >

            <input type="password" name="password" value=" " placeholder="Confirm Password">

            <span>
                <p class="text1"> Remember Me</p>
                <input type="checkbox" name="check" value = " "<?php if(isset($_COOKIE['check1'])){echo $_COOKIE['check1'];};?> >




            <button type="submit" name="submit" class="btn">Sign In</button>
            <small >Don't have an account? <a href="signup.php">Sign up</a></small>
        </form>
    </div>
</section>


</body>
