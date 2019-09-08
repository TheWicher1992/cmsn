<form action="" method="post">
    <div class = "form-group">
        <label for="cat-title">
            Edit Category
        </label>
        <?php
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_load_title_query = "SELECT * FROM categories WHERE cat_id = $edit_id";
            $result_edit_query = mysqli_query($connect,$edit_load_title_query);
            ?>
            <?php
            while($row = mysqli_fetch_assoc($result_edit_query)){
                $cat_title_edit = $row["cat_name"];

                ?>
                <input class = "form-control" name = "cat_title_edit" value = "<?php echo $cat_title_edit; ?>"  type="text">

                <?php
            }
        }

        //EDIT Category
        if(isset($_POST['submit_edit'])){
            $cat_name = $_POST['cat_title_edit'];
            $update_query = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = $edit_id";
            $result = mysqli_query($connect,$update_query);
            header('Location: categories.php');


        }

        ?>


    </div>
    <div class = "form-group">
        <input type="submit" name = "submit_edit" class = "btn btn-primary" value="Update">
    </div>
</form>