<!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0 bg-dark" style="border: 1px solid black!important">
                            <h4 class="m-0 text-uppercase font-weight-bold text-white">Tags</h4>
                        </div>
                        <div class="bg-dark border border-top-0 p-3" style="border: 1px solid black!important">
                            <div class="d-flex flex-wrap m-n1">
                                <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.slug as slug,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by RAND() desc limit 50");
while ($row=mysqli_fetch_array($query)) {
?>
                                <a href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>" class="btn btn-sm btn-outline-secondary m-1 text-capitalize"><?php echo htmlentities($row['posttitle']);?></a>
                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->