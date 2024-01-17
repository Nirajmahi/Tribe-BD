<?php
require 'config/database.php';
if($_COOKIE['subscribed'])
{
    echo "hi";
}

?>


<h1>Sign up for a my newsletter:</h1>

<?php if(($_COOKIE['subscribed']==1)) : ?>
    <form action="<?php ROOT_URL ?>unsubscribe.php" method="post">

     <label for="email"> <input type="text" name="email"> Email: name</label><br>

       <input type="submit" name="submit" value="unsubscribe"  >
     <?php else: ?>

     <form action="<?php ROOT_URL ?>subscribe.php" method="post">
        <label for="firstname"> <input type="text" name="firstname"> First name</label> <br>
        <label for="lastname"> <input type="text" name="lastname"> Last name</label><br>
        <label for="email"> <input type="text" name="email"> Email: name</label><br>
        <input type="submit" name="submit" value="subscribe"  >
        <?php endif ?>



</form>
