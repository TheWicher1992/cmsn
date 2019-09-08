<?php
$post_id = '';
if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $post_id";
$query_post_result = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($query_post_result)){
    $post_id = $row['post_id'];
    $post_content = $row['post_content'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_category = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_comment_count = $row['post_comment_count'];
    $post_tags = $row['post_tags'];
}

if(isset($_POST['submit_edit_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_tags = $_POST['post_tags'];
    $post_content = mysqli_real_escape_string($connect,trim($_POST['post_content']));
    if(empty($post_image)){
        $temp_query = "SELECT * FROM posts WHERE post_id = $post_id";
        $temp_result = mysqli_query($connect,$temp_query);
        while ($row = mysqli_fetch_assoc($temp_result)){
            $post_image = $row['post_image'];
        }
    }
    move_uploaded_file($post_image_tmp,"../images/$post_image");
    $query = "UPDATE posts SET ";
    $query .="post_title = '{$post_title}', ";
    $query .="post_category_id = '{$post_category}', ";
    $query .="post_date = now(), ";
    $query .="post_author = '{$post_author}', ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_tags = '{$post_tags}', ";
    $query .="post_content= '{$post_content}', ";
    $query .="post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id} ";
    $run_query = mysqli_query($connect,$query);
    confirm_query($run_query);
    header('Location: posts.php');


}




?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value = "<?php echo $post_title; ?>" class = 'form-control' type="text" name = "post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input value = "<?php echo $post_author; ?>" class = 'form-control' type="text" name = 'post_author'>
    </div>
    <div class="form-group">
        <!--<label for="image">Change Image</label>-->
        <?php echo "<img style='padding-bottom: 8px' width = '120' height='70' src='../images/$post_image' alt='image'>"; ?>
        <input type="file" name = "image">
    </div>
    <div class="form-group" >
        <label for="post_category">Choose Category</label>
        <select class = "form-control" name="post_category" id="" >
            <?php
            $query = "SELECT * FROM categories";
            $query_category_result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($query_category_result)){
                $cat_title = $row['cat_name'];
                $cat_id = $row['cat_id'];
                if($cat_id == $post_category){
                    echo "<option  value='$cat_id' selected>$cat_title</option>";
                }
                else{
                echo "<option  value='$cat_id'>$cat_title</option>";
                }

            }
            ?>


        </select>
    </div>
    <div class="form-group" >
        <label for="post_status">Choose Status</label>
        <select class = "form-control" name="post_status" id="">
            <option  value="draft" <?php if($post_status == "draft"){echo 'selected';} ?> >Draft</option>
            <option  value="publish" <?php if($post_status == "publish"){echo 'selected';} ?> >Publish (wait for approval)</option>
        </select>
    </div>

    <div class="form-group"></div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value = "<?php echo $post_tags; ?>" class = 'form-control'  name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class = "form-control" cols = "30" rows = "10" id="editor" name = "post_content"><?php echo $post_content; ?></textarea>
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
    <div class="form-group">
        <input type="submit" class = "btn btn-primary" name = "submit_edit_post" value = "Submit Post">
    </div>

</form>
