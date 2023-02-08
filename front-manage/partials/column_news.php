
                    <!-- Popular News Start En esta columna se ordenan las publicaciones segun el numero de visitantes-->
                    <div class="mb-3">
                        <div class="section-title mb-0 bg-dark" style="border: 1px solid black!important">
                            <h4 class="m-0 text-uppercase font-weight-bold text-white">Tendences</h4>
                        </div>


                        <?php 
                              if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 6;
                            //include 'partials/script.php'; // CONSULTA




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
                                tblposts.alt_uploaded as alt_uploaded,
                                tblposts.Description as description,
                                tblposts.PostImage,
                                tblcategory.CategoryName as category,
                                tblposts.slug as slug,
                                tblcategory.id as cid,
                                tblsubcategory.Subcategory as subcategory,
                                tblposts.PostDetails as postdetails,
                                tblposts.PostingDate as postingdate,
                                tblposts.PostUrl as url from tblposts
                                left join tblcategory on tblcategory.id=tblposts.CategoryId
                                left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId
                                where tblposts.Is_Active=1
                                order by tblposts.views asc LIMIT $offset, $no_of_records_per_page");
                               while ($row=mysqli_fetch_array($query)) {
                        ?>

                        <div class="bg-dark border border-top-0 p-3" style="border: 1px solid black!important">
                            <div class="d-flex align-items-center bg-dark mb-3" style="border: 1px solid black!important;height: 110px;">
                                <!--<img class="img-fluid opacidad" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="object-fit: cover;object-position: center;width: 150px;height: 110px" alt="<?php echo htmlentities($row['alt_uploaded']);?>">-->
                                <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><div style="width: 110px;height: 110px;background-size: cover;background-position: center;border:1px solid black; background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>)"></div></a>
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="border: 1px solid black!important">
                                    <div class="mb-2">
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>

                                        <br>
                                        <a class="text-body" href=""><small><?php // echo htmlentities($row['description']);?></small></a>
                                        <!--<br>-->
                                        <a class="text-body" href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><small><?php echo htmlentities($row['postingdate']);?></small></a>
                                         <br>    
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?subCategory=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                                    </div>
                                    
                                </div>
                            </div>
                            
                       
                            
                        </div>

                    <?php } ?>


                    </div>
                    <!-- Popular News End -->











                    