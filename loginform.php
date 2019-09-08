<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

    <main class="page login-page" style="font-family: Montserrat, sans-serif;">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                    <p>Login to manage your content.</p>
                </div>
                <form action="includes/login.php" method="post">
                    <div class="form-group"><label for="username">Username</label><input name="username" class="form-control item" type="text" id="username"></div>
                    <div class="form-group"><label for="password">Password</label><input name="user_password" class="form-control" type="password" id="password"></div>
                   <button class="btn btn-primary btn-block" name ="login" type="submit">Log In</button></form>
            </div>
        </section>
    </main>
<?php include "includes/footer.php"; ?>