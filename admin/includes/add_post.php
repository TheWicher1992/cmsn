<?php
    if(isset($_POST['submit_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_content = mysqli_real_escape_string($connect,trim($_POST['post_content']));
        move_uploaded_file($post_image_tmp,"../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_user_id,post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
        $post_user_id = $_SESSION['user_id'];
        $query .= "VALUES({$post_category}, $post_user_id,'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";

        $run_query = mysqli_query($connect,$query);
        confirm_query($run_query);
        echo "<h4 class=\"text-primary\">Post Added</h4>";

    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input class = 'form-control' type="text" name = "post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input class = 'form-control' type="text" name = 'post_author' value="<?php echo $_SESSION['username']; ?>">
    </div>
    <div class="form-group">
        <label for="image">Insert Image</label><br>
        <input type="file" name = "image">
    </div>
    <div class="form-group" >
        <label for="post_category">Choose Category</label>
        <select class = "form-control" name="post_category" id="">
        <?php
        $query = "SELECT * FROM categories";
        $query_category_result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($query_category_result)){
            $cat_title = $row['cat_name'];
            $cat_id = $row['cat_id'];
            echo "<option  value='$cat_id'>$cat_title</option>";
        }
        ?>


        </select>
    </div>
    <div class="form-group" >
        <label for="post_status">Choose Status</label>
        <select class = "form-control" name="post_status" id="">
            <option  value="draft">Draft</option>
            <option  value="publish">Publish (wait for approval)</option>
        </select>
    </div>

    <div class="form-group"></div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class = 'form-control'  name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class = "form-control" cols = "30" rows = "10" id="editor" name = "post_content"></textarea>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </div>
    <script src = "../js/scripts.js"></script>
    <div class="form-group">
        <input type="submit" class = "btn btn-primary" name = "submit_post" value = "Submit Post">
    </div>

</form>
