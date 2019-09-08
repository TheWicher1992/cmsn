<div class="table-responsive text-primary" style="filter: blur(0px) brightness(100%);">
    <table class="table table-hover">
    <thead>
    <tr>
        <th class="text-info">Id</th>
        <th class="text-warning">Title</th>
        <th class="text-info">Author</th>
        <th class="text-info">Date Published</th>
        <th class="text-info">Image</th>
        <th class="text-info">Category Id</th>
       <!-- <th>Post Tags</th>-->
        <th class="text-success">Status</th>
        <th class="text-info">Comments</th>
    <?php
        if($_SESSION['user_role'] == 'admin') {

        echo "<th class='text-success'>Approve</th>";
        echo "<th class='text-warning'>Un-Approve</th>";
}
        ?>
        <th class="text-info">Edit</th>
        <th class="text-danger">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "";
    if($_SESSION['user_role'] == 'admin'){
    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    }else{
        $active_id = $_SESSION['user_id'];
        $query = "SELECT * FROM posts WHERE post_user_id = $active_id ORDER BY post_id DESC";

    }
    $query_post_result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($query_post_result)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_category = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_comment_count = $row['post_comment_count'];
        $post_tags = $row['post_tags'];
        echo "<tr>";
        echo "<td class=\"text-info\">$post_id</td>";
        echo "<td class=\"text-warning\">$post_title</td>";
        echo "<td class=\"text-info\">$post_author</td>";
        echo "<td class=\"text-info\">$post_date</td>";
        echo "<td class=\"text-info\"><img width='120' src = '../images/$post_image'></td>";
        echo "<td class=\"text-info\">$post_category</td>";
       // echo "<td>$post_tags</td>";
        echo "<td class=\"text-success\">";
        if($post_status == 'publish'){
            echo "Publish (waiting for approval)";
        }
        else if($post_status == 'draft'){
            echo "Draft";
        }
        else if($post_status == 'approved'){
            echo "Approved";
        }
        else{
            echo 'Discarded by admin';
        }
        echo "</td>";
        echo "<td class=\"text-info\">$post_comment_count</td>";
        if($_SESSION['user_role'] == 'admin') {

            echo "<td><a class = 'btn btn-success' href='posts.php?approve=$post_id'>Approve</a></td>";
            echo "<td><a class = 'btn btn-warning' href='posts.php?unapprove=$post_id'>Un-Approve</a></td>";
            echo "<td><a class = 'btn btn-primary' href = 'posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
        }
        if($_SESSION['user_role'] == 'sub') {

           /* echo "<td><a class = 'btn btn-success' href=''>Approve</a></td>";
            echo "<td><a class = 'btn btn-warning' href=''>Un-Approve</a></td>";*/
            echo "<td><a class = 'btn btn-primary' href = 'posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
        }

        ?>
        <td><a onclick="return confirm('Are you sure about deleting this Item?');" class = 'btn btn-danger' href = 'posts.php?delete=<?php echo $post_id; ?>'>Delete</a></td>

        <?php
        //echo "<td><a href = 'category.php?delete=$cat_id'>Delete</a></td>";
        //echo "<td><a href = 'category.php?edit=$cat_id'>Edit</a></td>";
        echo "</tr>";
    }
    ?>

    <?php
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM posts WHERE post_id = $delete_id";
        $delete_result= mysqli_query($connect,$delete_query);
        confirm_query($delete_result);
        header("Location: posts.php");
    }
    if(isset($_GET['approve'])){
        $approve_post_id = $_GET['approve'];
        $approve_post_query = "UPDATE posts SET post_status = 'approved' WHERE post_id = $approve_post_id";
        $approve_result= mysqli_query($connect,$approve_post_query);
        confirm_query($approve_result);
        header("Location: posts.php");
    }
    if(isset($_GET['unapprove'])){
        $unapprove_post_id = $_GET['unapprove'];
        $unapprove_post_query = "UPDATE posts SET post_status = 'unapproved' WHERE post_id = $unapprove_post_id";
        $unapprove_result= mysqli_query($connect,$unapprove_post_query);
        confirm_query($unapprove_result);
        header("Location: posts.php");
    }

    ?>
    </tbody>
</table>
</div>

