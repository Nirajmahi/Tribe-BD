<?php
include 'partials/header.php';
//fetch 9 posts from posts table
$query = "select * from posts order by date_time desc";
$query_result = mysqli_query($connection,$query);
?>




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
                            <small> <?= date("M d, Y - H:i",strtotime($post['date_time'])) ?></small>
                        </div>
                    </div>

                </div>
            </article>
        </div>
        <?php endwhile ?>
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
<?php
include 'partials/footer.php';
?>