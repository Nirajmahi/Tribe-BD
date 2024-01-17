<?php
include 'partials/header.php';
$query ="select * from event limit 3";
$result= mysqli_query($connection,$query);
$event1= mysqli_fetch_assoc($result);
$event2=mysqli_fetch_assoc($result);
$event3=mysqli_fetch_assoc($result);


?>





    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        .img1 {vertical-align: middle;
             object-fit: contain;}


        .slideshow-container {
            max-width: 1000px;
            max-height: 900px;
            position: relative;
            margin: auto;
        }


        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }




        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }



        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }


        }
    </style>
</head>
<body>

<section style="padding: 50px">
    <div class="slideshow-container">

        <div class="mySlides fade">

            <img src="images/<?=$event1['thumbnail']?>" style="width:100%">
            <div class="text"><?=$event1['name']?></div>
        </div>
        <div class="mySlides fade">

            <img src="images/<?=$event2['thumbnail']?>" style="width:100%">
            <div class="text"><?=$event2['name']?></div>
        </div>
        <div class="mySlides fade">

            <img src="images/<?=$event3['thumbnail']?>" style="width:100%">
            <div class="text"><?=$event3['name']?></div>
        </div>


    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>



<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000);
    }
</script>

</body>
</html>
