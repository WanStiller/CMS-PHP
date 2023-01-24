                        

                        <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 7;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.Autor as autor,tblposts.Views as views,tblposts.Description as description,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                                ?>




                       <!--<div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid w-50 h-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?php echo htmlentities($row['category']);?></a>
                                        <a class="text-body" href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""><?php echo htmlentities($row['posttitle']);?></a>
                                </div>
                            </div>
                        </div>-->

                          
                            <div class="col-lg-12 opacidad">
                            <div class="position-relative mb-3">
                                 <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>">
                                    <div class="home-preview2" style="border:1px solid black; background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>)"></div></a>
                                <!--<img class="img-fluid w-100 h-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;">
                                <div style="background: black;opacity: 0.8;color: white;width: 100%;text-transform: uppercase;text-decoration: none!important;text-align: center;padding: 10px;letter-spacing: 3px;"><h5><?php echo htmlentities($row['posttitle']);?></h5></div>
                                -->
                                <div class="bg-dark border-top-0 p-4" style="border: 1px solid black">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                                        <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>"><small><?php echo htmlentities($row['postingdate']);?></small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                                    <p class="m-0"><?php echo ($row['description']);?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-dark border-top-0 p-4" style="border: 1px solid black">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="images/usericon.png" width="30" height="30" alt="mia kalifha">
                                        <small style="text-transform: capitalize;"><?php echo htmlentities($row['autor']);?></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i><?php echo htmlentities($row['views']);?></small>
                                        <!--<small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php } ?>