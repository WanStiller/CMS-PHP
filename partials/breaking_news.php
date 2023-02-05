    

    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container-fluid">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">                           

                            <?php
                    $query=mysqli_query($con,"select tblposts.id as pid,tblposts.slug as slug,tblposts.PostTitle as posttitle,tblposts.Description as Description, tblposts.PostImage as PostImage, tblposts.alt_uploaded as altuploaded from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by RAND() desc limit 4");
                while ($row=mysqli_fetch_array($query)) {
                        ?>

                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['Description'])?></a></div>

                    <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
