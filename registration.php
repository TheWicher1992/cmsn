<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


    <main class="page registration-page" style="font-family: Montserrat, sans-serif;">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info" style="font-family: Montserrat, sans-serif;">Registration</h2>                    <p>Register yourself to post Articles&nbsp;</p>
                    <?php
                    if(isset($_POST['register'])){
                        $username = $_POST['username'];
                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $user_password = $_POST['user_password'];
                        $user_email = $_POST['user_email'];
                        $username_validation_query = "SELECT * FROM users WHERE username = '$username'";
                        $email_validation_query = "SELECT * FROM users WHERE user_email = '$user_email'";
                        $result_username = mysqli_query($connect,$username_validation_query);
                        $result_email = mysqli_query($connect,$email_validation_query);
                        if(!mysqli_num_rows($result_username) == 0){
                            echo "<h2 class='text-danger' style=\"font-family: Montserrat, sans-serif;\">Username already exists</h2>";

                        }
                        if(!mysqli_num_rows($result_email) == 0){
                            echo "<h2 class='text-danger' style=\"font-family: Montserrat, sans-serif;\">User E-Mail already exists</h2>";

                        }
                        else{
                            $register_query = "INSERT INTO users (username, user_firstname, user_lastname, user_password, user_email) VALUES ('$username','$user_firstname','$user_lastname','$user_password','$user_email')";
                            $register_result = mysqli_query($connect,$register_query);
                            confirm_query($register_query);
                            echo "<h2 class='text-success'>You were successfully registered.</h2>";


                        }
                    }
                    ?>
                </div>
                <form method="post" action="">
                    <div class="form-group"><label for="name">First Name</label><input name="user_firstname" class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="name">Last Name</label><input name="user_lastname" class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="name">Username</label><input name="username" class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="password">Password</label><input name="user_password" class="form-control item" type="password" id="password"></div>
                    <div class="form-group"><label for="email">Email</label><input name="user_email" class="form-control item" type="email" id="email"></div>
                    <button class="btn btn-primary btn-block" type="submit" name="register">Register Me!</button>
                </form>
            </div>
        </section>
    </main>
<?php include "includes/footer.php"; ?>