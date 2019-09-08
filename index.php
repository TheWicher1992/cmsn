<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
    <main class="page blog-post-list" style="font-family: Montserrat, sans-serif;">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info" style="font-family: Montserrat, sans-serif;">Blogs and Articles</h2>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Search a Post</span></div><input class="form-control" name="search" type="text">
                            <div class="input-group-append"><button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-search border-white" style="color: rgb(255,255,255);"></i></button></div>

                        </div>
                    </form>
                </div>
                <div class="block-content">
                <?php
                $query = "SELECT * FROM posts WHERE post_status = 'approved'  ORDER BY post_id DESC";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($result)){
                    $p_id = $row['post_id'];

                    ?>

                    <div class="clean-blog-post">
                        <div class="col" style="padding-bottom: 15px">
                            <div class="border rounded-0"></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-5"><img class="rounded img-fluid" src="images/<?php echo $row['post_image']; ?>"></div>
                            <div class="col-lg-7">
                                <h3 style="font-family: Montserrat, sans-serif;"> <a href="post.php?p_id=<?php echo $p_id;?>"><?php echo $row['post_title']; ?></a></h3>
                                <div class="info"><span class="text-muted"><?php echo $row['post_date']; ?> by&nbsp;<a><?php echo $row['post_author']; ?></a></span></div>
                                <p style="font-family: Montserrat, sans-serif;"><?php echo substr($row['post_content'],0,150); ?>
                                </p>
                                <a class="btn btn-outline-primary btn-sm" role="button"  href="post.php?p_id=<?php echo $p_id; ?>">Read More</a>

                            </div>
                            <div class="col" style="padding-top: 15px">
                                <div class="border rounded-0"></div>
                            </div>

                        </div>


                    </div>

                    <?php
                        }


                        ?>


            </div>
        </section>
    </main>
<?php include "includes/footer.php"; ?>