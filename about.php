
<?php
include 'partials/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            font-size: 17px;
        }

        .container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .container img {vertical-align: middle;}

        .container .content {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body>


<section>
 <div class="container" style="top: 100px">
    <img src="images/.1d.jpg" style="width:100%;">
    <div class="content">
       <mark>
           About Us
       </mark>
        <mark>
            <h1>We are the movement for tribal prople's right.</h1>
        </mark>
        <mark>
            <h3>
                <mark>We help them to defend their lives, protect their lands and determine their own futures.</mark>
            </h3>
        </mark>
    </div>
</div>
</section>

<section style="padding: 50px">
    <article>
        <h2> Our Work</h2>
        <p>
            We exist to prevent the injustice of tribal peoples and to give them a platform to speak to the world
            so they can bear witness to the  racism they face on a daily basis.
            By lobbying the powerful we help defend the lives, lands and futures of people
            who should have the same rights as other contemporary societies.
        </p>
    </article>

</section>



</body>
</html>


<?php
include 'partials/footer.php';
?>