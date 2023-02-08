

<!-- Featured News Slider Start -->
    <div class="container-fluid mb-3">
        <div class="container-fluid">
            <div class="section-title bg-dark" style="border:0px">
                <h4 class="m-0 text-uppercase font-weight-bold text-white">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                            <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 3;
                            }
                            $no_of_records_per_page = 6;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $query=mysqli_query($con,
                                "select tblposts.id as pid,
                                tblposts.PostTitle as posttitle,
                                tblposts.alt_uploaded as alt_uploaded,
                                tblposts.Views as views,
                                tblposts.slug as slug,
                                tblposts.Description as description,
                                tblposts.PostImage,
                                tblcategory.CategoryName as category,
                                tblcategory.id as cid,
                                tblsubcategory.Subcategory as subcategory,
                                tblposts.PostDetails as postdetails,
                                tblposts.PostingDate as postingdate,
                                tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 ORDER BY tblposts.id desc LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                                ?>
                <div class="position-relative overflow-hidden opacidad" style="height: 300px;">
                    <img class="img-fluid h-100" src="<?php echo "$uploaded_image";?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;" alt="<?php echo htmlentities($row['alt_uploaded']);?>">
                    <div class="overlay">
                        <div class="mb-2">
                            <!---->
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a><br>
                            <a class="m-0 text-white text-capitalize font-weight-semi-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['description']);?></a><br>
                            <!---->
                            <a style="margin-top: 10px" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                            <!--<a class="text-white" href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    