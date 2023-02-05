<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>

                
                        <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 5;
                            }
                            $no_of_records_per_page = 3;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $query=mysqli_query($con,
                            "select tblposts.id as pid,
                            tblposts.PostTitle as posttitle,
                            tblposts.Autor as autor,
                            tblposts.Views as views,
                            tblposts.Description as description,
                            tblposts.PostImage,
                            tblcategory.CategoryName as category,
                            tblcategory.id as cid,
                            tblsubcategory.Subcategory as subcategory,
                            tblposts.PostDetails as postdetails,
                            tblposts.PostingDate as postingdate,
                            tblposts.slug as slug,
                            tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND()  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                                ?>

                <div class="mb-3">
                    <div class="mb-2">

                        <a class="small text-body text-uppercase font-weight-medium" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                        <br>
                        <a class="small text-body text-capitalize font-weight-medium" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['description']);?></a>
                        <br>
                        <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><small><?php echo htmlentities($row['postingdate']);?></small></a>        
                        <br>
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                </div>
            </div>
                <?php } ?>

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <?php
                    $query=mysqli_query($con,"SELECT * from tblcategory order by RAND()");
                    while ($row=mysqli_fetch_array($query)) {
                        $name = $row['CategoryName'];
                        $cid = $row['id'];
                        ?>
                        <a href="category.php?subCategory=<?php echo htmlentities($row['id'])?>" class="btn btn-sm btn-secondary m-1 text-capitalize"><?php echo htmlentities($row['CategoryName']);?></a>
                    <?php } ?>    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Photos</h5>
                <div class="row">
                    <?php
                    $query=mysqli_query($con,"select tblposts.id as pid,tblposts.slug as slug,tblposts.PostTitle as posttitle, tblposts.PostImage as PostImage, tblposts.alt_uploaded as altuploaded from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by RAND() desc limit 6");
                while ($row=mysqli_fetch_array($query)) {
                        ?>
                    <div class="col-4 mb-3">
                        <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><div class="home-preview" style="border:1px solid black; background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>)"></div></a>
                        <!--<a href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><img class="w-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['altuploaded']);?>"></a>-->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <!--TEXT FOOTER GLOBAL-->
    <?php
    $pagetype='footer';
    $query=mysqli_query($con,"select PageTitle,Description, Vistas, UpdationDate from tblpages where PageName='$pagetype'");
    //$query2=mysqli_query($con,"Update tblpages set Vistas=Vistas+1 where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <?php echo $row['Description'];?>
    <?php } ?>
    <!-- END TEXT FOOTER  -->
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="template/lib/easing/easing.min.js"></script>
    <script src="template/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="template/js/main.js"></script>