<!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="./" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Web<span class="text-white font-weight-normal">Site</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="./" class="nav-item nav-link active">Home</a>
          
                    <?php
                    $query=mysqli_query($con,"SELECT * from tblcategory order by RAND() limit 6");
                    while ($row=mysqli_fetch_array($query)) {
                        $name = $row['CategoryName'];
                        $cid = $row['id'];
                        ?>
                        <a href="../category.php?subCategory=<?php echo htmlentities($row['id'])?>" class="nav-item nav-link"><?php echo htmlentities($row['CategoryName']);?></a>
                    <?php } ?>


                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>-->
                    <!--<a href="template/contact.html" class="nav-item nav-link">Contact</a>-->
                </div>

                  
                <form name="search" action="../search.php" method="post">
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Search..." name="searchtitle" minlength="3" required>
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3" type="submit"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
                </form>



            </div>
        </nav>
    </div>
    <!-- Navbar End -->