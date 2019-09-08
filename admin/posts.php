<?php include "includes/admin_header.php" ?>

<div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <?php
                    $source = "";
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }
                    switch ($source){
                        case "add_post";
                            include 'includes/add_post.php';
                            break;
                        case "edit_post";
                            include "includes/edit_post.php";
                            break;

                        case "approve";
                            include "includes/edit_post.php";
                            break;

                        case "unapprove";
                            include "includes/edit_post.php";
                            break;
                        default;
                            include 'includes/view_all_posts.php';
                            break;
                    }

                    ?>

                </div>
            </div>
    </div>
        </div>
            <?php include "includes/admin_footer.php" ?>
