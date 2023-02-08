<!-- Front manage-->

<?php 
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
//echo 'Welcome';
}
else{
?>

<?php require 'top-bar2.php'; ?>
<!-- End Front manage-->
<?php } ?>

<!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block text-uppercase">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#"><?php
                            echo date('l jS'); //\t\h\e
                            ?></a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="../archive.php">Archive</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Contact</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link text-body small" href="#">Login</a>
                        </li>-->
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center py-3 px-lg-5" style="background: black">
            <div class="col-lg-4">
                <a href="../" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Web<span class="text-secondary font-weight-normal">Site</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <?php //echo add1(); // PUBLICIDAD?>
            </div>
        </div>
    </div>
    <!-- Topbar End -->