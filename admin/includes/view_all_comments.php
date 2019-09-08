
<div class="table-responsive text-primary" style="filter: blur(0px) brightness(100%);">
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
    <?php
    $query = '';
    if($_SESSION['user_role'] == 'admin'){
        $query = "SELECT * FROM comments";
    }
    else{
        $active_id = $_SESSION['user_id'];
        $query = "SELECT * FROM comments WHERE comment_post_user_id = $active_id";

    }    $query_comment_result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($query_comment_result)){

        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_date = $row['comment_date'];
        $comment_email = $row['comment_email'];
        $comment_post_id = $row['comment_post_id'];
        $comment_status = $row['comment_status'];
        $comment_content = $row['comment_content'];
        $query_tmp = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $tmp_result = mysqli_query($connect,$query_tmp);
        confirm_query($tmp_result);
        $comment_post_name = '';
        while($tmp_row = mysqli_fetch_assoc($tmp_result)){
            $comment_post_name = $tmp_row['post_title'];
        }
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_date</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_post_name</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_content</td>";
        ?>
        <td><a class='btn btn-danger' onclick="return confirm('Are you sure you want to delete this item?');" href = 'comments.php?delete_comment=<?php echo $comment_id; ?>'>Delete</a>
        <?php
        echo "<td><a class = 'btn btn-success' href = 'comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a class = 'btn btn-warning' href = 'comments.php?unapprove=$comment_id'>Un-Approve</a></td>";
        echo "</tr>";
    }
    ?>

    <?php
    if(isset($_GET['delete_comment'])){
        $delete_id = $_GET['delete_comment'];
        $delete_query = "DELETE FROM comments WHERE comment_id = $delete_id";
        $delete_result= mysqli_query($connect,$delete_query);
        confirm_query($delete_result);
        header("Location: comments.php");
    }
    if(isset($_GET['approve'])){
        $approve_comment_id = $_GET['approve'];
        $approve_comment_query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
        $approve_result= mysqli_query($connect,$approve_comment_query);
        confirm_query($approve_result);
        header("Location: comments.php");

    }

    if(isset($_GET['unapprove'])){
        $unapprove_comment_id = $_GET['unapprove'];
        $unapprove_comment_query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
        $unapprove_result= mysqli_query($connect,$unapprove_comment_query);
        confirm_query($unapprove_result);
        header("Location: comments.php");

    }

    ?>
    </tbody>
</table>
</div>

