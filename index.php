<?php
include 'partials/header.php';

//fetch featured post from database
$featured_query = "Select * from posts where is_featured=1";
$featured_result = mysqli_query($connection,$featured_query);
$featured= mysqli_fetch_assoc($featured_result);
$category_id= $featured['category_id'];
$category_query = "Select * from categories where id = $category_id";
$category_result= mysqli_query($connection,$category_query);
$category =mysqli_fetch_assoc($category_result);
//fetch 9 posts from posts table
$query = "select * from posts order by date_time desc";
$query_result = mysqli_query($connection,$query);


?>
<?php if(mysqli_num_rows($featured_result)==1):?>
   <style>

  * {
    box-sizing: border-box;
    }

    body {
    font-family: Arial;
    font-size: 17px;
    }

    .container1 {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
    }

    .container1 img {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }

    .container1 .content {
    position: absolute;
    bottom: 0;
    background: rgb(0, 0, 0); /* Fallback color */
    background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
    }
  .column1 {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px;
  }
  .row:after {
      content: "";
      display: table;
      clear: both;
  }
  .mysection{
      position: relative;
      top: 150px;
      background-image: url("images/tribal2.jpg");
      background-size: contain;
  }
  .bg-text {
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0, 0.4);
      color: white;
      font-weight: bold;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      width: 80%;
      padding: 20px;
      text-align: center;
  }
  .bg-image {

      background-image: url("images/tribal2.jpg");

      position: absolute;
      z-index: 1;
      filter: blur(8px);
      -webkit-filter: blur(8px);

      height: 100%;


      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
  }

  </style>
    <section>
        <div class="container1">
            <img src="images/survival.jpg" alt="Notebook" style="width:100%;">
            <div class="content">
                <h1 >Tribe Bd</h1>
                <h3>
                    For tribes, for nature, for all humanity</h3>
                <p >

                    We work in partnership with tribal peoples to protect their lives and land.
                    They suffer racism, land theft, forced development and genocidal violence just because they live differently.
                    It must stop.
                </p>
            </div>
        </div>
    </section>



<section class="featured" style="padding: 150px; margin-top: -100px">
    <div class="container featured_container">
        <div class="post_thumbnail">
            <img src="images/<?=$featured['thumbnail']?>" style="float: left">
        </div>
    <div class="post_info" style="float:right">

        <a href="<?= ROOT_URL ?>category-posts.php?id=<?=$category['id']?>" class="category_button"><?=$category['title']?></a>
        <h2 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?=$featured['id']?>"><?= $featured['title'] ?></a></h2>
        <p class ="post_body">
            <?= $featured['body'] ?>
            <?= substr($featured['body'],0,300)?>...
        </p>

        <div class="post_author">
          <?php
          $author_id = $featured['author_id'];
          $author_query = "select * from users where id =$author_id";
          $author_result= mysqli_query($connection,$author_query);
          $author = mysqli_fetch_assoc($author_result);
          ?>

            <div class="post_author-avatar">
                <img src="images/<?=$author['avatar']?>">
            </div>
            <div class="post_author-info">
                <h5>By:<?="{$author['firstname']} {$author['lastname']}" ?></h5>
                <small> <?= date("M d, Y - H:i",strtotime($featured['date_time'])) ?></small>
            </div>
        </div>

    </div>
    </div>
</section>
<?php endif ?>
<!--end of feature-->
    <section class="banner" style="padding: 100px ;margin-top: -150px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6" style="border:1px solid #ddd">
                    <img src="images/<?=$featured['thumbnail']?>" class="img-fluid">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6" style="border:1px solid #ddd ; background-color: dimgray" >
                    <h2 style="padding: 20px ;color: white;">We're hiring!</h2>
                 <div style="padding: 20px">
                     <p style="color: white">
                         We’re offering a rewarding opportunity for a highly skilled community fundraiser to join our team in London. If you're a creative self-starter with lots of energy and ideas, you have experience working in community fundraising or outreach for a non-profit, and do you want to work for an organisation that helps make the world a better place - apply now.</p>
                 </div>
                      <span style="padding: 20px">
                          <button class="btn" style=" background-color: #FFDB58; position: absolute; ">
                            Apply Now
                        </button>

                      </span>

                </div>
            </div>
        </div>
    </section>




    <section style="padding: 150px; margin-top: -100px;">
        <div class="row1">
        <div class="column1" style="background-color: #FFDB58;">
            <h2 style="color: white; font-weight: bold"> Support the movement</h2>
            <p>We rely on your donations- without you
                there can be no survival.
            </p>
            <span>
                <div class="btn" style="background-color: #00c476">
                    <a href="<?php ROOT_URL ?>donate.php"</a>Donate
                </div>
            </span>
        </div>
        <div class="column1" style="object-fit: fill" >
           <img src="images/tribal2.jpg" height="300px">
        </div>
    </div>

</section>
<section class="mysection" style="padding: 150px">
     <div class="bg-image"></div>
    <div class="bg-text" >

        <h1 style="font-size:50px"> What We Do</h1>
        <p>We give tribal peoples a platform to speak to the world.</p>
        <p> But our work is far from over and we need your help.</p>
        <div class="btn" style="background-color: lightgoldenrodyellow" ><a href="<?php ROOT_URL ?>about.php">Find Out More</a></div>
    </div>

</section>



  <section class="posts" style="padding: 150px; display:flex; justify-content: space-between;">

    <div class=""  >
       <?php while($post= mysqli_fetch_assoc($query_result)) :?>

          <article class="post" style="margin-right: 30px; height: 500px; overflow-y: scroll">
              <div class="post_thumbnail ">
                  <img src="images/<?=$post['thumbnail']?>" style="float: left">
              </div>
                 <div class="post_info">
                  <?php
                  $category_id= $post['category_id'];
                  $category_query = "Select * from categories where id =$category_id";
                  $category_result= mysqli_query($connection,$category_query);
                  $category =mysqli_fetch_assoc($category_result);
                  ?>
                  <a href="<?= ROOT_URL ?>category-posts.php?id=<?=$category['id']?>" class="category_button"><?=$category['title']?></a>


                  <h3 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?=$post['id']?>"> <?= $post['title'] ?></a></h3>
              <p class="post_body">
                  <?= $post['body'] ?>
                  <?= substr($post['body'],0,150)?>...?>
                  <div class="post_author">
                      <?php
                      $author_id = $post['author_id'];
                      $author_query = "select * from users where id =$author_id";
                      $author_result= mysqli_query($connection,$author_query);
                      $author = mysqli_fetch_assoc($author_result);
                      ?>


                      <div class="post_author-avatar">
                          <img src="images/<?=$author['avatar']?>" style="float: left">
                      </div>
                      <div class="post_author-info">
                          <h5>By:<?="{$author['firstname']} {$author['lastname']}" ?></h5>
                          <small> <?= date("M d, Y - H:i",strtotime($featured['date_time'])) ?></small>
                      </div>
                  </div>

              </div>
          </article>
      </div>
   <?php endwhile ?>
  </section>
<section style="padding: 20px;top: -250px">
    <div style="background-color: #FFDB58 ;height: 300px ;width: 1500px ; padding: 150px">
        <a href="<?php ?>index2.php">Join the mailing list </a>
    </div>
</section>

<section class="category_buttons">
    <div class="container category_buttons-container">
        <?php
        $all_categories_query =" Select * from categories";
        $all_categories = mysqli_query($connection,$all_categories_query);
        ?>
        <?php while($category1= mysqli_fetch_assoc($all_categories)):?>
        <a href="<?= ROOT_URL ?>category-posts.php?id=<?=$category1['id']?>" class="category_button"><?=$category1['title']?></a>
        <?php endwhile ?>

    </div>
</section>

<!-- ========end of category buttons=======-->
<?php
include 'partials/footer.php';

?>