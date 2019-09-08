<?php
include 'db.php';
include "../admin/includes/functions.php";
session_start();
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['user_password'];
    /* if($username === '' && $password === ''){
         header('Location: ../index.php');
     }*/

    $query = "SELECT * FROM users WHERE username = '$username'";
    $user_result = mysqli_query($connect, $query);
    confirm_query($user_result);
    if ($row = mysqli_fetch_assoc($user_result)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }
}
if ($password === $db_user_password && $username === $db_username) {
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['user_id'] = $db_user_id;

    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;
    header('Location: ../admin');
}else {
    header('Location: ../index.php');
}

?>
