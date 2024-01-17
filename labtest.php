<?php
require 'config/database.php';
?>

<!DOCTYPE>
<html>
<head>
    labtest
</head>
<title>
    labtest
</title>
<body>
<form action="<?= ROOT_URL ?>datainput-logic.php"  method="post">

    <input  name="name"  placeholder="Name" >

    <input type="text" name="dept" placeholder="Enter Department">







    <button type="submit" name="submit" class="btn" style="background-color: #FFDB58">Submit</button>
</form>
</body>
</html>

