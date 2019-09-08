<?php
$u_id = '';
if (isset($_GET['u_id'])){
    $u_id = $_GET['u_id'];
}
if(isset($_POST['submit_edit_user'])){
    $username = escape($_POST['username']);
    $user_firstname = escape($_POST['user_firstname']);
    // $post_image = $_FILES['image']['name'];
    //$post_image_tmp = $_FILES['image']['tmp_name'];
    $user_lastname = escape($_POST['user_lastname']);
    $user_password = escape($_POST['user_password']);
    $user_email = escape($_POST['user_email']);
    $user_role = escape($_POST['user_role']);

    //move_uploaded_file($post_image_tmp,"../images/$post_image");

    $query = "UPDATE users SET ";
    $query .="username = '{$username}', ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_password = '{$user_password}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_role= '{$user_role}' ";
    $query .= "WHERE user_id = {$u_id} ";
    $run_query = mysqli_query($connect,$query);

    $run_query = mysqli_query($connect,$query);
    confirm_query($run_query);
    header('Location: users.php');

}
$u_id = '';
if (isset($_GET['u_id'])){
    $u_id = $_GET['u_id'];
}
$load_query = "SELECT * FROM users WHERE user_id = $u_id";
$load_result = mysqli_query($connect,$load_query);
confirm_query($load_result);
while($row = mysqli_fetch_assoc($load_result)){
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
}



?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username; ?>" class = 'form-control' type="text" name = "username">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" class = 'form-control' type="text" name = 'user_firstname'>
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input class = 'form-control' value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" >
    </div>
    <div class="form-group" >
        <label for="user_password">Password</label>
        <input type="text" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>
    <div class="form-group" >
        <label for="user_email">User Email</label>
        <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>
    <div class="form-group" >
        <label for="user_role">User Role</label>
        <select class = "form-control" name="user_role" id="user_role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>

    </div>

    <div class="form-group">
        <input type="submit" class = "btn btn-primary" name = "submit_edit_user" value = "Edit User">
    </div>

</form>

