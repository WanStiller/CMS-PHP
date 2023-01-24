                        

                        <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 6;
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
                            tblposts.Autor as autor,
                            tblposts.Views as views,
                            tblposts.Description as description,
                            tblposts.PostImage,
                            tblposts.alt_uploaded as altuploaded,
                            tblcategory.CategoryName as category,
                            tblcategory.id as cid,
                            tblsubcategory.Subcategory as subcategory,
                            tblposts.PostDetails as postdetails,
                            tblposts.PostingDate as postingdate,
                            tblposts.slug as slug,
                            tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                                ?>




                        <div class="col-lg-6 opacidad">
                            <div class="d-flex align-items-center bg-dark mb-3 text-white" style="height: 110px;border:1px solid black!important">
                                <img class="img-fluid w-50 h-100" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;border-top:2px solid black;border-bottom:2px solid black;" alt="<?php echo htmlentities($row['altuploaded'])?>">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="border: 1px solid black!important">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                                        <br>
                                        <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><small><?php echo htmlentities($row['postingdate']);?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>



