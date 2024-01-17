<?php
require 'config/database.php';

//Make connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//SQL query
$sql = "SELECT * FROM event";
$result = $connection->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $dir= "" . $row['thumbnail']. "";
        echo" <div class='content section' style='max-width:500px'>
             <img class='slides' src='$dir' style=width:100%></div>";
    }
} else {
    echo "Empty Gallery";
}
?>

<html>
<body>
<script>
    var index = 0;
    slideshow();
    function slideshow() {
        var i;
        var x = document.getElementsByClassName("slides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        index++;
        if (index > x.length) {index = 1}
        x[index-1].style.display = "block";
        setTimeout(slideshow, 3000); // Change slides every 3 seconds
    }
</script>
</body>
</html>
