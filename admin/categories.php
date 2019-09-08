<?php include "includes/admin_header.php" ?>
<?php
//ADD Category
//DELETE Category
deleteCategories();
?>
<div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <?php
                        if(isset($_POST['submit_add'])){
                            addCategories();
                        }
                        ?>
                        <form method="post" action="">
                            <label class="text-primary">Enter Category to add</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit_add" value="Add">
                            </div>
                        </form>
                        <?php
                        if(isset($_GET['edit'])){
                            include "includes/update_categories.php";
                        }

                        ?>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="table-responsive text-primary" style="filter: blur(0px) brightness(100%);">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //LOAD ALL CATEGORIES TO TABLE
                                    loadAllCategoriesToTable();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php include "includes/admin_footer.php" ?>
