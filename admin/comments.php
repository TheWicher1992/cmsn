<?php include "includes/admin_header.php" ?>

<div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
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
                                default;
                                    include 'includes/view_all_comments.php';
                                    break;
                            }

                            ?>
                           <!-- <div class="table-responsive text-primary" style="filter: blur(0px) brightness(100%);">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Comment ID</th>
                                            <th>Category Author</th>
                                            <th>Comment Date</th>
                                            <th>Author's E-Mail</th>
                                            <th>Comment Post</th>
                                            <th>Comment Status</th>
                                            <th>Comment Content</th>
                                            <th>Approve</th>
                                            <th>Un-Approve</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td>Cell 1</td>
                                            <td><a class="btn btn-success" href="#">Approve</a></td>
                                            <td><a class="btn btn-warning" href="#">Un-Approve</a></td>
                                            <td><a class="btn btn-danger" href="#">Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                           -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php include "includes/admin_footer.php" ?>
