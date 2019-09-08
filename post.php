<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

    <main class="page blog-post" style="font-family: Montserrat, sans-serif;">
        <section class="clean-block clean-post dark">
            <div class="container">
            <?php
            $p_id = '';
            if(isset($_GET['p_id'])){
                $p_id = $_GET['p_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id = $p_id";
            $result = mysqli_query($connect, $query);
            confirm_query($result);
            while($row = mysqli_fetch_assoc($result)){
                $p_id = $row['post_id'];
                $post_user_id = $row['post_user_id'];
                ?>
                <div class="block-content">
                    <div class="post-image" style="background-image:url(&quot;images/<?php echo $row['post_image']; ?>&quot;);"></div>
                    <div class="post-body">

                        <h3><?php echo $row['post_title']; ?></h3>
                        <div class="post-info"><span>By <?php echo $row['post_author']; ?> On <?php echo $row['post_date']; ?></span></div>
                        <p><?php echo $row['post_content']; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                if(isset($_POST['submit_comment'])){
                    $comment_post_user_id = $post_user_id;
                    $comment_post_id = $p_id;
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    $query_add = "INSERT INTO comments (comment_post_id, comment_post_user_id, comment_author, comment_email, comment_content,comment_date)";

                    $query_add .= "VALUES ($comment_post_id , $comment_post_user_id,'{$comment_author}', '{$comment_email}', '{$comment_content }',now())";
                    $result_add_comment = mysqli_query($connect,$query_add);
                    confirm_query($result_add_comment);

                }

                ?>
                <div style="padding: 25px 0px 0px 0px;">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="comment_author">Name</label>
                            <input type="text" class = 'form-control' name = 'comment_author'>
                        </div>
                        <div class="form-group">
                            <label for="comment_email">E-Mail</label>
                            <input type="email" class = 'form-control' name = 'comment_email'>
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comment</label>
                            <textarea class="form-control" name = 'comment_content' rows="3"></textarea>
                        </div>
                        <button type="submit" name = 'submit_comment' class="btn btn-primary">Submit</button>
                    </form>
<!--
                    <form>
                        <div class="form-group"><label>Name</label><input class="form-control" type="text"></div>
                        <div class="form-group"><label>E-Mail</label><input class="form-control" type="text"></div>
                        <div class="form-group"><label>Comment</label><textarea class="form-control"></textarea></div><button class="btn btn-primary" type="button">Submit</button>
                    </form>-->
                </div>
                <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $p_id AND comment_status = 'approved' ORDER BY comment_id DESC ";
                $result = mysqli_query($connect,$query);
                confirm_query($result);
                while ($row = mysqli_fetch_assoc($result)){
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    ?>
                <div style="padding: 25px 0px 0px 0px;">
                    <h4>Comments:</h4>
                    <div class="post-body" style="padding: 25px 0px 0px 0px;background-color: white;">

                        <h5><?php echo $comment_author; ?> <small><?php echo $comment_date; ?></small>
                        </h5>
                        <p><?php echo $comment_content; ?></p>
                    </div>
                </div>

                    <?php
                }
                ?>
            </div>
        </section>
    </main>
<?php include "includes/footer.php"; ?>