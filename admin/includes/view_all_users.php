<div class = 'table-responsive'>
<table class = "table table-hover table-bordered" style="margin-right: 100px" >
    <thead>
    <tr>
        <th class="text-info">Id</th>
        <th class="text-warning">Username</th>
        <th class="text-info">First Name</th>
        <th class="text-info">Last Name</th>
        <th class="text-warning">E-Mail</th>
        <th class="text-info">Role</th>
        <th class="text-info">Make Admin</th>
        <th class="text-info">Make Subscriber</th>
        <th class="text-info">Edit</th>
        <th class ='text-danger'>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $query_users_result = mysqli_query($connect,$query);
    confirm_query($query_users_result);
    while($row = mysqli_fetch_assoc($query_users_result)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        //echo "<td><img width='120' src = '../images/$post_image'></td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";
        echo "<td><a class = 'btn btn-success' href = 'users.php?make_admin=$user_id'>Admin</a></td>";
        echo "<td><a class = 'btn btn-warning' href = 'users.php?make_subscriber=$user_id'>Subscriber</a></td>";
        echo "<td><a class = 'btn btn-primary' href = 'users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
        ?>
        <td><a onclick="return confirm('Are you sure about deleting this Item?');" class="btn btn-danger" href = 'users.php?delete=<?php echo $user_id; ?>'>Delete</a></td>
<?php
        echo "</tr>";
    }
    ?>

    <?php
    if(isset($_GET['delete'])){

        $delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM users WHERE user_id = $delete_id";
        $delete_result= mysqli_query($connect,$delete_query);
        confirm_query($delete_result);
        header("Location: users.php");
    }
    if(isset($_GET['make_admin'])){
        $admin_id = $_GET['make_admin'];
        $make_admin_query = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_id";
        $admin_result = mysqli_query($connect,$make_admin_query);
        confirm_query($admin_result);
        header("Location: users.php");

    }

    if(isset($_GET['make_subscriber'])){
        $subscriber_id = $_GET['make_subscriber'];
        $make_subscriber_query = "UPDATE users SET user_role = 'sub' WHERE user_id = $subscriber_id";
        $subscriber_result = mysqli_query($connect,$make_subscriber_query);
        confirm_query($subscriber_result);
        header("Location: users.php");

    }

    ?>
    </tbody>
</table>
</div>

