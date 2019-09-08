<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #931638;background-image: url(&quot;none&quot;);">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-user"></i></div>
            <div class="sidebar-brand-text mx-3"><span>CMS Admin</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                <a class="nav-link" href="categories.php"><i class="fa fa-list-alt"></i><span>Categories</span></a>
                <a class="nav-link" href="comments.php"><i class="fa fa-caret-square-o-down"></i><span>Comments</span></a>
            </li>
            <li
                class="nav-item dropdown"><a class="dropdown-toggle nav-link  <?php if($_SESSION['user_role'] == 'sub'){echo 'disabled';} ?>" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-users"></i><span>Users</span></a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="users.php?source=add_user">Add User</a><a class="dropdown-item" role="presentation" href="users.php">All Users</a></div>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">&nbsp;<i class="fa fa-navicon"></i><span>Posts</span></a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="posts.php?source=add_post">Add Post</a><a class="dropdown-item" role="presentation" href="posts.php">All Posts</a></div>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <ul class="nav navbar-nav flex-nowrap ml-auto">
                    <li class="nav-item dropdown no-arrow" role="presentation">
                    <li class="nav-item"><span><a class="nav-link" href="../index.php"><span class="text-gray-600">Home</span></a></li>

                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['username']; ?> </span><img class="border rounded-circle img-profile" src="assets/img/avatars/user.jpg"></a>
                        <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="../includes/logout.php"  ><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a></div>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>