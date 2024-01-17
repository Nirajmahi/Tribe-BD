<?php
include 'partials/header.php';

//fetch featured post from database
$featured_query = "Select * from posts where is_featured=1";
$featured_result = mysqli_query($connection,$featured_query);
$featured= mysqli_fetch_assoc($featured_result);
$category_id= $featured['category_id'];
$category_query = "Select * from categories where id =$category_id";
$category_result= mysqli_query($connection,$category_query);
$category =mysqli_fetch_assoc($category_result);
//fetch 9 posts from posts table
$query = "select * from posts order by date_time desc";
$query_result = mysqli_query($connection,$query);


?>
<?php if(mysqli_num_rows($featured_result)==1):?>
    <style xmlns="http://www.w3.org/1999/html">
      * {
          box-sizing: border-box;
      }

      .column {
          float: left;
          width: 50%;
          padding: 5px;
      }
      .btn1{
          display: inline-block;
          width: fit-content;
          padding: 0.6rem 1.2rem;
          background: var(--color-primary);
          border-radius: var(--card-border-radius-2);
          cursor: pointer;
          transition: var(--transition);
          color: var(--color-white);
      }
      .limit{
          width:200px;
          word-wrap: anywhere;
      }
      .b1{
          padding-left: 100px;
          padding-right: 100px;
      }

      /* Clearfix (clear floats) */
      .row::after {
          content: "";
          clear: both;
          display: table;
      }
  </style>



    <section class="featured">
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
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6" style="border:1px solid #ddd">
                <img src="images/<?=$featured['thumbnail']?>" class="img-fluid">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6" style="border:1px solid #ddd">
                <h2>Bootstrap Responsive Website</h2>
                <p>Bootstrap is a famous front-end framework used to create mobile-first responsive websites. The latest release
                    version of bootstrap has removed JQuery dependency not fully work on vanilla javascript.</p>
                <p>Using bootstrap it becomes very easy to build a responsive website.</p>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
    <!--end of feature-->

    <section class="posts">
        <div class="container">

            <div class="row">
                <?php while($post= mysqli_fetch_assoc($query_result)) :?>
        <div class="col-4" >



            <figure class="figure">
                <img src="images/img_snow_wide.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">
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
                    Bootstrap is a famous front-end framework used to create mobile-first responsive websites. The latest release
                    version of bootstrap has removed JQuery dependency not fully work on vanilla javascript.
                </figcaption>
            </figure>
        </div>
        <?php endwhile ?>
            </div>
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