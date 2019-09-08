<?php
if(isset($_POST['submit_user'])){
    $username = escape($_POST['username']);
    $user_firstname = escape($_POST['user_firstname']);
   // $post_image = $_FILES['image']['name'];
    //$post_image_tmp = $_FILES['image']['tmp_name'];
    $user_lastname = escape($_POST['user_lastname']);
    $user_password = escape($_POST['user_password']);
    $user_email = escape($_POST['user_email']);
    $user_role = escape($_POST['user_role']);

    //move_uploaded_file($post_image_tmp,"../images/$post_image");

    $query = "INSERT INTO users(username, user_firstname, user_lastname, user_password,user_email,user_role) ";

    $query .= "VALUES('{$username}','{$user_firstname}','{$user_lastname}','$user_password','{$user_email}','{$user_role}') ";

    $run_query = mysqli_query($connect,$query);
    confirm_query($run_query);
    echo "<h4 class=\"text-primary\">User Added</h4>";


}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input class = 'form-control' type="text" name = "username">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input class = 'form-control' type="text" name = 'user_firstname'>
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input class = 'form-control' type="text" name="user_lastname" >
    </div>
    <div class="form-group" >
        <label for="user_password">Password</label>
        <input type="text" class="form-control" name="user_password">
    </div>
    <div class="form-group" >
        <label for="user_email">User Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group" >
        <label for="user_role">User Role</label>
        <select class = "form-control" name="user_role" id="user_role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>

    </div>

    <div class="form-group">
        <input type="submit" class = "btn btn-primary" name = "submit_user" value = "Add User">
    </div>

</form>

