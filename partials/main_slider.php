                            <!-- Main News Slider Start -->
                            <div class="container-fluid">
                            <?php //Portada
                            $pagetype='portada';
                            $query=mysqli_query($con,"select PageTitle,Description, Vistas, UpdationDate from tblpages where PageName='$pagetype'");
                            $query2=mysqli_query($con,"Update tblpages set Vistas=Vistas+1 where PageName='$pagetype'");
                            while($row=mysqli_fetch_array($query))
                            {
                              ?>
                              <?php //echo $row['Vistas'];?>
                          <?php } ?>
                          <div class="row">
                            <div class="col-lg-6 px-0">
                                <div class="owl-carousel main-carousel position-relative">
                                  <?php 
                                  if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 4;
                                $offset = ($pageno-1) * $no_of_records_per_page;
                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                $result = mysqli_query($con,$total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);
                                $query=mysqli_query($con,
                                    "select tblposts.id as pid,
                                    tblposts.PostTitle as posttitle,
                                    tblposts.slug as slug,
                                    tblposts.alt_uploaded as alt_uploaded,
                                    tblposts.Views as views,
                                    tblposts.Description as description,
                                    tblposts.PostImage,
                                    tblcategory.CategoryName as category,
                                    tblcategory.id as cid,
                                    tblsubcategory.Subcategory as subcategory,
                                    tblposts.PostDetails as postdetails,
                                    tblposts.PostingDate as postingdate,
                                    tblposts.PostUrl as url
                                    from tblposts left join tblcategory
                                    on tblcategory.id=tblposts.CategoryId
                                    left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId
                                    where tblposts.Is_Active=1
                                    order by tblposts.id desc
                                    LIMIT $offset, $no_of_records_per_page");
                                while ($row=mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="position-relative overflow-hidden opacidad" style="height: 500px;">
                                        <img class="img-fluid h-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;" alt="<?php echo htmlentities($row['alt_uploaded']);?>">
                                        <div class="overlay">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                                                <a class="text-white" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['postingdate']);?></a>
                                            </div>
                                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                                            <a class="m-0 text-white text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['description']);?></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="col-lg-6 px-0">
                            <div class="row mx-0">
                              <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 2;
                            }
                            $no_of_records_per_page = 4;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $query=mysqli_query($con,
                                "select tblposts.id as pid,
                                tblposts.PostTitle as posttitle,
                                tblposts.slug as slug,
                                tblposts.alt_uploaded as alt_uploaded,
                                tblposts.Views as views,
                                tblposts.Description as description,
                                tblposts.PostImage,
                                tblcategory.CategoryName as category,
                                tblcategory.id as cid,
                                tblsubcategory.Subcategory as subcategory,
                                tblposts.PostDetails as postdetails,
                                tblposts.PostingDate as postingdate,
                                tblposts.PostUrl as url
                                from tblposts left join tblcategory
                                on tblcategory.id=tblposts.CategoryId
                                left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId
                                where tblposts.Is_Active=1
                                order by tblposts.id desc
                                LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                                ?>
                                <div class="col-md-6 px-0 opacidad">
                                    <div class="position-relative overflow-hidden" style="height: 250px;">
                                        <img class="img-fluid w-100 h-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;" alt="<?php echo htmlentities($row['alt_uploaded']);?>">
                                        <div class="overlay">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                                            </div>
                                            <a class="h6 m-0 text-white text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                                            <a class="m-0 text-white text-capitalize font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['description']);?></a>
                                            <a class="text-white" href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main News Slider End -->
