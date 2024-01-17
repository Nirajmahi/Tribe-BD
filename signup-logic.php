<?php

require  'config/database.php';


//get signup form data if signup butto was clicked

if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname= filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username= filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];


    //validate input values
    if(!$firstname){

        $_SESSION['signup']= 'Please enter your first name';
    }elseif(!$lastname){
        $_SESSION['signup']= 'Please enter your last name';

    }elseif(!$username){
        $_SESSION['signup']= 'Please enter username ';

    }elseif(!$email){
        $_SESSION['signup']= 'Please enter a valid email';


    }elseif(strlen($createpassword)<8 || strlen($confirmpassword)<8)
    {
        $_SESSION['signup']= 'Password should be 8+ characters';

    }elseif(!$avatar['name'])

    {
        $_SESSION['signup']= 'Please add an avatar';

    }
    else
    {
        //check if passwords matches or not
        if($createpassword !== $confirmpassword)
        {
            $_SESSION['signup']="Password is incorrect";
        }
        else
        {
            //hash password
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
           // check if username or email already exists in database
           // $user_check_query = " SELECT * FROM users WHERE username ='$username' OR email= '$email'";
            //$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $result = $connection->query("SELECT * FROM users WHERE username ='$username' OR email= '$email'");
            $user_check_result = $result->num_rows;
           if($user_check_result>0)
           {
               $_SESSION['signup'] ="Username or Email already exists";
           }
           else
           {
               //work on avatar
               //rename avatar
               $time= time(); //make each image unique using current timestamp
               $avatar_name= $time . $avatar['name'];
               $avatar_tmp_name= $avatar['tmp_name'];
               $avatar_destination_path = 'images/'.$avatar_name;

               //make sure file is an image
               $allowed_files =['png','jpg','jpeg'];
               $extension = explode('.',$avatar_name);
               $extension =end( $extension);
               if(in_array($extension,$allowed_files))
               {
                   //make sure image is not so large(120mb+);
                   if($avatar['size']< 10000000){
                       //upload avatar
                       move_uploaded_file($avatar_tmp_name,$avatar_destination_path);

                   }
                   else
                   {
                       $_SESSION['signup'] ='File size too big';
                   }
               }
               else
               {
                   $_SESSION['signup'] ='File should be png, jpg or jpeg';
               }





           }

        }

    }
  // redirect to sign up page if there was NY ERROR
    if(isset($_SESSION['signup']))
    {
        $_SESSION['signup-data'] =$_POST;
       header( 'location:' . ROOT_URL . 'signup.php ');
        die();
    }
    else
    {
        //insert new user
        $insert_user_query = "INSERT INTO users (firstname, lastname, username,email,password,avatar,is_admin) 
        VALUES ('$firstname','$lastname','$username','$email','$hashed_password','$avatar_name',0)";
        $insert_user_result= mysqli_query( $connection,$insert_user_query);
        if(!mysqli_errno($connection))
        {
            $_SESSION['signup-success'] = "Registration successful. Please log in";
            header('location:'. ROOT_URL.'signin.php');
            die();
        }


    }






}else
{
    //if button was not clicked ,bounce back to prev page
    header('location'. ROOT_URL.'signup.php');
    die();
}