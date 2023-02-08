<?php 
    session_start();
    require_once 'partials/configuration.php';
    require_once 'partials/article_visual.php';
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
                        <div class="bg-dark" style="width: 100%!important;margin-top: -1px!important">
                            <?php
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.Autor as autor,tblposts.description as description,tblposts.alt_uploaded as alt_uploaded,tblposts.PostUploaded as PostUploaded,tblposts.Views as views,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
$query2=mysqli_query($con,"Update tblposts set views=views+1 where id=$pid");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo '<script>window.location.replace("index.php");</script>';
}

while ($row=mysqli_fetch_array($query)) {
?>

<!--<div class="home-preview2" style="border:1px solid black; background-image: url(<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>)"></div>-->

<div>
<div>
<?php //require('includes/header.php'); ESTA LINEA ESTABLECE EL MENU SI ES LOGIN O NO
    //if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){include("includes/article-no.php");} else {require("includes/article.php");}
?>

<div style="margin:20px;padding-top: 10px!important;font-size: 0.9em">





<?php 
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
//echo 'Welcome';
}
else{
?>

<a href="#">
        <div><img src="images/pencil.png" style="width: 100%;height: auto;max-width: 50px;display: inline-block; margin-bottom:10px;margin-right: 20px;"><h2 style="display: inline-block;">EDITAR ESTE ARTICULO</h2></div>
</a>


<!-- End Front manage-->
<?php } ?>






    <h1 class="text-uppercase text-secondary"><?php echo htmlentities($row['posttitle']);?></h1>
<p class="text-uppercase text-secondary"><b>Category : </b> <?php echo htmlentities($row['category']);?> <!--<a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"></a>--> |
<b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?><br>
<b> Posted on </b><?php echo htmlentities($row['postingdate']);?> | <span style="opacity: 0.6">Posted by <?php echo ($row['autor']);?></span>
|

<?php echo htmlentities($row['views']);?> lecturas

</p>

<p class="text-white"><?php echo htmlentities($row['description']);?></p>
</div>

  <style media="screen">
    figure.zoom {
    background-position: 50% 50%;
    position: relative;
    height: auto;
    width: 100%;
    overflow: hidden;
    cursor: zoom-in;
    }
    figure.zoom img:hover {
    opacity: 0;
    }
    figure.zoom img {
    transition: opacity 0.5s;
    display: block;
    width: 100%;
    }
  </style>

<!--<figure class="zoom img_preview" onmousemove="zoom(event)" style="background-image: url(<?php echo "$uploaded_image"; ?>fullresolution/<?php echo htmlentities($row['PostUploaded']);?>">
<img src="<?php echo "$uploaded_image"; ?>fullresolution/<?php echo htmlentities($row['PostUploaded']);?>" style="width: 100%;height: auto" alt="<?php echo htmlentities($row['alt_uploaded']);?>" class="img_preview">
</figure>-->
<script type="text/javascript">
function zoom(e){
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX/zoomer.offsetWidth*100
  y = offsetY/zoomer.offsetHeight*100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}
</script>




<!--<img class="img-fluid rounded" src="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">-->
<div style="margin: 20px;border-bottom: 0.3em solid transparent">
    <form class="mb-4">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control p-4" placeholder="Your Name" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control p-4" placeholder="Your Email" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Subject" required="required"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Send Message</button>
                            </div>
</form>
    <?php //$pt=$row['postdetails']; echo  (substr($pt,0));?>
</div>
</div>




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