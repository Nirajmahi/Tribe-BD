<?php
require 'config/database.php';
?>

<!DOCTYPE>
<html>
<head>
    labtest
</head>
<title>
    input salaries
</title>
<body>
<form action="<?= ROOT_URL ?>salaries-logic.php"  method="post">

    <input  name="salary-id" type="text"  placeholder="salary-id" >

    <input type="text" name="amount" placeholder="Enter amount">
    <input type="text"  name ="id"    placeholder="Enter Id">






    <button type="submit" name="submit" class="btn" style="background-color: #FFDB58">Submit</button>
</form>
</body>
</html>