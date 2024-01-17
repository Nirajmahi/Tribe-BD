<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    //get form data
    $username_email = filter_var($_POST['username_email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);




    if(!$username_email)
    {
        $_SESSION['signin'] =" Username or Email Required";

    }elseif(!$password)
    {
        $_SESSION['signin'] = "Password Required";
    }
    else{
        //fetch user data from database

       // $connection1 = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        $fetch_user_result =  $connection->query( " SELECT * FROM users WHERE username =' $username_email' OR 
                             email='$username_email'");
        $user_check_result = $fetch_user_result->num_rows;
        if($user_check_result==1)
        {
            $user_record =mysqli_fetch_assoc($fetch_user_result);
            $db_password=$user_record['password'];
            //compare the password with databasepassword
            if(password_verify($password,$db_password))
            {
                // set session for user access
                $_SESSION['user-id']= $user_record['id'];

                //set session if user is admin
                if($user_record['is_admin']==1) {
                    $_SESSION['user_is_admin'] = true;
                }
                    //set cookie
                    if($_POST['check'])
                    {   setcookie('username_email',$_POST['username_email'],time()+3600);
                        setcookie('password',$_POST['password'],time()+3600);

                        setcookie('login',"checked",time()+3600);
                    }
                    else
                    {
                        setcookie('username_email'," ",-3600);
                        setcookie('password'," ",-3600);
                        setcookie('login'," ",-3600);
                    }




               header('location:'.ROOT_URL);


            }
            else
            {
                $_SESSION['signin'] ="Please check your input";
            }
        }else{
            $_SESSION['signin'] ="User not found";
        }
    }
    //if any problem,redirect hack to signin with login data
    if(isset($_SESSION['signin'])) {
        $_SESSION['signin-data']= $_POST;
        header('location:'.ROOT_URL.'signin.php');
        die();
    }


}
else{
    header('location:'.ROOT_URL.'signin.php');
    die();
}
