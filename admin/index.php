<?php include "includes/admin_header.php" ?>
<div id="wrapper">
        <?php include "includes/admin_navigation.php" ?>
        <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>
            <?php
            $query = "SELECT * FROM posts";
            $result = mysqli_query($connect,$query);
            $total_posts = mysqli_num_rows($result);

            $query = "SELECT * FROM comments";
            $result = mysqli_query($connect,$query);
            $total_comments = mysqli_num_rows($result);

            $query = "SELECT * FROM users";
            $result = mysqli_query($connect,$query);
            $total_users = mysqli_num_rows($result);

            $query = "SELECT * FROM categories";
            $result = mysqli_query($connect,$query);
            $total_categories = mysqli_num_rows($result);
            ?>

                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Posts</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $total_posts; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Comments</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $total_comments; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Users</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php echo $total_users; ?></span></div>
                                            </div>
                                            <!--<div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Categories</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $total_categories; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class = 'col-12'>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['', 'Total Number'],
                            <?php
                            $chart_head = ['Posts','Categories','Comments'];
                            $chart_data = [$total_posts,$total_categories,$total_comments];
                            for($i = 0; $i < 3; $i++){
                                echo "['$chart_head[$i]'"." ," . $chart_data[$i] . "],";
                            }

                            ?>
                            /* ['Posts', 1000, 'red'],
                             ['Categories', 1170, 'green'],
                             ['Comments', 660, 'yellow']*/
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                    <!-- /.row -->

                </div>
            </div>

        </div>
    </div>
            <?php include "includes/admin_footer.php" ?>
