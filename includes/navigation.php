<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background-color: #99b6cc;padding: 10px;">
    <div class="container"><a class="navbar-brand logo" href="#">CMS BY MSNPROJECTS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Categories</a>
                    <div class="dropdown-menu" role="menu">
                        <?php
                        $query = "SELECT * FROM categories";
                        $query_result = mysqli_query($connect,$query);
                        confirm_query($query_result);
                        while($row = mysqli_fetch_assoc($query_result)){
                            $cat = $row['cat_name'];
                            $cat_id = $row['cat_id'];
                            /* echo "<li><a href='category.php?category=$cat_id'>$cat</a></li>";*/
                            echo "<a class='dropdown-item' role='presentation' href='category.php?category=$cat_id'>$cat</a>";


                        }
                        ?>
                    </div>
                </li>
                <?php if(!isset($_SESSION['username'])){
                    echo "<li class=\"nav-item\" role=\"presentation\"><a class=\"nav-link\" href=\"loginform.php\">LOGIN</a></li>";
                    echo "<li class=\"nav-item\" role=\"presentation\"><a class=\"nav-link\" href=\"registration.php\">REGISTER</a></li>";
                } ?>
                <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.php">About Us</a></li>
                <?php if(isset($_SESSION['username'])){echo "<li class=\"nav-item\" role=\"presentation\"><a class=\"nav-link\" href='admin'>ADMIN PANEL</a></li>";} ?>

<!--                <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.html">ADMIN PANEL</a></li>
-->            </ul>
        </div>
    </div>
</nav>
