<?php 
error_reporting(0);
?>
<?php 
session_start();
require_once 'partials/configuration.php';
?>

<?php
               if($_GET['subCategory']!=''){
                $_SESSION['subCategory']=intval($_GET['subCategory']);
              }
              $query=mysqli_query($con,"SELECT * from tblcategory WHERE id='".$_SESSION['subCategory']."'");
              while ($row=mysqli_fetch_array($query)) {
                $CategoryName = $row['CategoryName'];
                $Description = $row['Description'];

                ?>
                <?php $here=$row['CategoryName']; // Titulo del Sitio?>
                <?php //echo htmlentities($row['CategoryName']);?>
<?php } ?>
<?php
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
               if($_GET['subCategory']!=''){
                $_SESSION['subCategory']=intval($_GET['subCategory']);
              }
              $query=mysqli_query($con,"SELECT * from tblcategory WHERE id='".$_SESSION['subCategory']."'");
              while ($row=mysqli_fetch_array($query)) {
                $CategoryName = $row['CategoryName'];
                $Description = $row['Description'];

                ?>

                <div class="col-12 mt-3">
                  <div class="section-title bg-dark" style="border: 0px!important">
                   <h4 class="m-0 text-uppercase font-weight-bold text-secondary">Category: <?php echo htmlentities($row['CategoryName']);?></h4>
                 </div>
               </div>

             <?php } ?>
             <?php

    //Datos get traidos de cursos.php | Variable de tipo GET
             if($_GET['subCategory']!=''){
               $_SESSION['subCategory']=intval($_GET['subCategory']);
     //echo $_SESSION['subCategory'];
             }
             $query=mysqli_query($con,"SELECT * from tblsubcategory WHERE CategoryId='".$_SESSION['subCategory']."' order by rand()");

             $rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "<div class='col-md-12 mt-2'><h2 class='text-uppercase text-secondary'>No Results</h2></div>";
}


             while ($row=mysqli_fetch_array($query)) {
              $name = $row['CategoryId'];
              $cid = $row['CategoryId'];
              $PostImage = $row['PostImage'];
              $PostingDate = $row['PostingDate'];
              $Desc = $row['SubCatDescription'];
              $CategoryName = $row['CategoryName'];
              ?>


              <div class="col-lg-6">
                <div class="position-relative mb-3">
                 <a href="subcategory.php?catid=<?php echo htmlentities($row['SubCategoryId'])?>">
                  <div class="opacidad" style="background-image: url(<?php echo "$uploaded_image"; ?>category/<?php echo htmlentities($row['PostImage']);?>);width: 100%;height:0;padding-top:50%; background-position: 50% 50%; background-size: cover;position: relative;"></div>
                </a>
                <div class="bg-dark border-top-0 p-4">
                  <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                    href="subcategory.php?catid=<?php echo htmlentities($row['SubCategoryId'])?>"><?php echo htmlentities($row['Subcategory']);?></a>
                    <a class="text-body" href="subcategory.php?catid=<?php echo htmlentities($row['SubCategoryId'])?>"><small><?php echo htmlentities($row['PostingDate']);?></small></a>
                  </div>
                  <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="subcategory.php?catid=<?php echo htmlentities($row['SubCategoryId'])?>"><?php echo htmlentities($row['Subcategory']);?></a>
                  <p class="m-0"><?php echo htmlentities($row['SubCatDescription']);?></p>
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
                              <?php  } ?>
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