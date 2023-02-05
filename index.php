<?php 
    session_start();
    require_once 'partials/configuration.php';
    require_once 'partials/visual.php';
?>
<body>
    <?php require 'partials/topbar.php';
            require 'partials/navigation.php';
            require_once 'partials/main_slider.php'; // 1 AND 2
            require_once 'partials/breaking_news.php'; //NO
            require 'partials/featured.php'; // PAGE 3
    ?>
    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title bg-dark" style="border:0px">
                                <h4 class="m-0 text-uppercase font-weight-bold text-white">Latest News</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <?php require 'partials/latest.php'; // PAGE 4 ?>
                        <div class="col-lg-12 mb-3">
                            <?php add2();// PUBLICIDAD ?>
                        </div>
                        <?php require 'partials/latest2.php'; // PAGE 5 ?>
                        <?php require_once 'partials/latest3.php'; // PAGE 6?>
                        <div class="col-lg-12 mb-3">
                            <?php add3(); // PUBLICIDAD ?>
                        </div>
                        <?php require_once 'partials/full-column.php'; // PAGE 7 ?>
                        <?php require 'partials/latest4.php'; // PAGE 8?>
                    </div>
                </div>              
                <div class="col-lg-4">
                    <?php require 'partials/social.php'; ?>
                    <?php include 'partials/add.php'; // COLUMNA ADD?>
                    <?php include 'partials/column_news.php'; ?>
                    <?php include 'partials/newsletter.php'; ?>
                    <?php include 'partials/tags.php';?>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

    <!-- Footer Start -->
    <?php require 'partials/global_footer.php' ?>
</body>

</html>