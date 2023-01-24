<?php 
error_reporting(0);
//$here= "Category";
?>

<?php 
session_start();
require_once 'partials/configuration.php';
$here="PORNO";
require_once 'partials/visual.php';
?>

<body>
  <?php require 'partials/topbar.php';
  require 'partials/navigation.php';
            //require_once 'partials/article_featured.php'; // 1 AND 2

            //require 'partials/featured.php'; // PAGE 3
  ?>
  <!-- News With Sidebar Start -->
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-9">
          <div>
            <div style="width: 100%!important;margin-top: -1px!important">

             <div class="row">

     


                <?php 
if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
$no_of_records_per_page = 1;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,
"select tblposts.id as pid,
 tblposts.slug as slug,
tblposts.PostTitle as posttitle,
tblposts.Views as views,
tblposts.Description as description,
tblposts.PostImage,
tblcategory.CategoryName as category,
tblsubcategory.Subcategory as subcategory,
tblposts.PostDetails as postdetails,
tblposts.PostingDate as postingdate,
tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by rand() desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
//echo "No Results";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>


<div class="col-12 mt-3">
                  <div class="section-title bg-dark" style="border: 0px!important">
                   <h4 class="m-0 text-uppercase font-weight-bold text-secondary">Post by <?php echo htmlentities($row['subcategory']);?></h4>
                 </div>
               </div>


<?php } ?>
<?php } ?>



                <?php 
if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
$no_of_records_per_page = 12;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,
"select tblposts.id as pid,
tblposts.slug as slug,
tblposts.PostTitle as posttitle,
tblposts.Views as views,
tblposts.Description as description,
tblposts.PostImage,
tblcategory.CategoryName as category,
tblsubcategory.Subcategory as subcategory,
tblposts.PostDetails as postdetails,
tblposts.PostingDate as postingdate,
tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "<div class='col-md-12 mt-3'><h2 class='text-uppercase text-secondary'>No Results</h2></div>";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>



<div class="col-lg-6">
                <div class="position-relative mb-3">
                 <a href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>">
                  <div class="opacidad" style="background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>);width: 100%;height:0;padding-top:50%; background-position: 50% 50%; background-size: cover;position: relative;"></div>
                </a>
                <div class="bg-dark border-top-0 p-4">
                  <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                    href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                    <a class="text-body" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><small><b>Views</b> <?php echo htmlentities($row['views']);?> - <?php echo htmlentities($row['postingdate']);?></small></a>
                  </div>
                  <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="article.php?nid=<?php echo htmlentities($row['pid'])?>/<?php echo htmlentities($row['slug'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                  <p class="m-0"><?php echo htmlentities($row['description']);?></p>
                </div>

                                <!--<div class="d-flex justify-content-between bg-dark border-top-0 p-4" style="border-top: 1px solid black!important">

                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="template/img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                  </div>-->
                                </div>
                              </div>


<?php } ?>





            <ul class="pagination justify-content-center mb-4 text-uppercase text-secondary mt-4 col-md-12">
  <li class="btn btn-sm btn-secondary m-1"><a href="?pageno=1"  class="btn btn-sm btn-secondary m-1">First</a></li>
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> btn btn-sm btn-secondary m-1">
    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="btn btn-sm btn-secondary m-1">Prev.</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> btn btn-sm btn-secondary m-1">
      <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="btn btn-sm btn-secondary m-1">Next.</a>
    </li>
    <li class="btn btn-sm btn-secondary m-1"><a href="?pageno=<?php echo $total_pages; ?>" class="btn btn-sm btn-secondary m-1">Last</a></li>
  </ul>
<?php } ?>





              </div>

                        </div>

                      </div>

                      <div style="margin: -8px" class="mt-3 mb-3">
                        <?php require_once 'partials/article_featured.php';

                         // 1 AND 2 ?>
                       </div>

                       <div style="margin: -0px" class="mt-3">
                        <?php 
                                require_once 'partials/breaking_news.php'; //NO
                         // 1 AND 2 ?>
                       </div>


                     </div>              
                     <div class="col-lg-3 mt-3">
                      <?php //require 'partials/social.php'; ?>
                      <?php include 'partials/add.php'; // COLUMNA ADD?>
                      <?php include 'partials/column_news.php'; ?>
                      <?php //include 'partials/newsletter.php'; ?>
                      <?php include 'partials/tags.php';?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- News With Sidebar End -->

              <!-- Footer Start -->
              <?php require 'partials/global_footer.php' ?>
            </body>

            </html>