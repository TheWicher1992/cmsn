<?php /*include "db.php"; */?>

<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" name = "search" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name = "submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>


    <div class="well">
        <h4>Sign In</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
            <input class = "form-control" placeholder="Username" type="text" name="username">
            </div>
            <div class="input-group">
                <input type="password" name = "user_password" placeholder="Password" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name = "login">
                                Login
                        </button>
                        </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query2 = "SELECT * FROM categories LIMIT 4";
                    $query_result_cat = mysqli_query($connect,$query2);
                    while($row = mysqli_fetch_assoc($query_result_cat)){
                        $catname = $row['cat_name'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?category=$cat_id'>$catname</a></li>";
                    }
                    ?>

                    <!--<li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.col-lg-6 -->
           <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>-->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>

</div>
<!-- /.row -->

<hr>
