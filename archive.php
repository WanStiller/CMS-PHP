<?php 
    session_start();
    require_once 'partials/configuration.php';
    $here="PORNO";
    require_once 'partials/visual.php';
?>

<body>
    <?php require 'partials/topbar.php';
            require 'partials/navigation.php';
    ?>
    <!-- News With Sidebar Start -->

        <div class="container mt-4">
            <div class="row">
  <?php 
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
  } else {
    $pageno = 1;
  }
  $no_of_records_per_page = 30;
  $offset = ($pageno-1) * $no_of_records_per_page;
  $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
  $result = mysqli_query($con,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $query=mysqli_query($con,
    "select tblposts.id as pid,tblposts.slug as slug,
    tblposts.PostTitle as posttitle,
    tblposts.Views as views,
    tblposts.alt_uploaded as alt_uploaded,
    tblposts.Description as description,
    tblposts.PostImage,
    tblcategory.CategoryName as category,
    tblcategory.id as cid,
    tblsubcategory.Subcategory as subcategory,
    tblposts.PostDetails as postdetails,
    tblposts.PostingDate as postingdate,
    tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
  while ($row=mysqli_fetch_array($query)) {
    ?>
    <div class="col-2" style="margin-bottom: 1.5em">
     
        <a href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>">
          <div style="background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>);width: 100%;padding-top:100%;background-position: 50% 50%; background-size: cover;border: 1px solid yellow">
            <img src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" style="display: none" alt="<?php echo htmlentities($row['alt_uploaded']);?>">
          <div style="width: 100%;background: black;opacity: 0.7;font-size: 0.7em;text-align: center;padding: 5px;display: none"><p><?php echo htmlentities($row['posttitle']);?></p></div>
          </div>
        </a>


  </div>
<?php } ?>

             
            </div>


            <ul class="pagination justify-content-center mb-4 text-uppercase text-secondary">
  <li class="btn btn-sm btn-secondary m-1"><a href="?pageno=1"  class="btn btn-sm btn-secondary m-1">First</a></li>
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> btn btn-sm btn-secondary m-1">
    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="btn btn-sm btn-secondary m-1">Prev.</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> btn btn-sm btn-secondary m-1">
      <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="btn btn-sm btn-secondary m-1">Next.</a>
    </li>
    <li class="btn btn-sm btn-secondary m-1"><a href="?pageno=<?php echo $total_pages; ?>" class="btn btn-sm btn-secondary m-1">Last</a></li>
  </ul>



        </div>

    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <?php require 'partials/global_footer.php' ?>
</body>

</html>




