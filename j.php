<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    //get form data
    echo $_POST['username_email'];
    if($_POST['check'])
    {    setcookie('username_email',$_POST['username_email'],time()+3600);
        setcookie('password',$_POST['password'],time()+3600);

        setcookie('check1',"checked",time()+3600);
    }


}