<?php 
session_start();
 require_once '../partials/configuration.php';
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$posttitle=$_POST['posttitle'];
$description=$_POST['description'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$status=1;
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set PostTitle='$posttitle',Description='$description',CategoryId='$catid',SubCategoryId='$subcatid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'");
if($query)
{
$msg="Artículo Actualizado ";
}
else{
$error="Intente nuevamente.";    
} 
}
?>





<?php 

   
    require_once 'partials/article_visual.php';
?>

<body>
    <?php require 'partials/topbar.php';
            require 'partials/navigation.php';


    ?>
    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-1 mt-3">
                </div>


                <div class="col-lg-10 mt-4" id="form_edit">
                    <div>
                        <div class="bg-dark" style="width: 100%!important;margin-top: -1px!important">



<div>
<div>




<div style="margin:20px;padding-top: 10px!important;font-size: 0.9em">



<!--AVISO -->
    <div class="col-sm-12 mt-3 mb-3">  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Correcto!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
<!--FIN DE AVISO -->



<?php
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.Description as description,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
while($row=mysqli_fetch_array($query))
{
?>

        <div style="opacity: 0.5"><img src="../images/pencil.png" style="width: 100%;height: auto;max-width: 50px;display: inline-block; margin-bottom:10px;margin-right: 20px;"><h2 style="display: inline-block;" class="text-secondary">Editar: <?php echo htmlentities($row['title']);?></h2></div>





<hr>

</p>


</div>





<div style="margin: 20px;border-bottom: 0.3em solid transparent">
    <form class="mb-4" name="addpost" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TITULO</label>
                                        <input type="text" class="form-control p-4" id="posttitle" value="<?php echo htmlentities($row['title']);?>" name="posttitle" placeholder="Enter title" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DESCRIPTION</label>
                                        <input type="text" class="form-control p-4" id="description" value="<?php echo htmlentities($row['description']);?>" name="description" placeholder="Enter" required/>
                                    </div>
                                </div>
                            
                      





                                <div class="col-md-6">
                                    <div class="form-group"><label>Categor&iacute;a</label>
<select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['category']);?></option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>
</select> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Sub Categor&iacute;a</label>
<select class="form-control" name="subcategory" id="subcategory" required>
<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcategory']);?></option>
</select> 
                                    </div>
                                </div>
                     
</div>




<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30"><b>Contenido</b></h4>


<div style="background: white"><textarea  name="postdescription" required id="summernote"><?php echo htmlentities($row['PostDetails']);?></textarea></div>
    <script>
      $('#summernote').summernote({
        placeholder: '...',
        tabsize: 20,
        height: 500,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>







</div>
</div>
</div>




                         












                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4 mt-3" style="height: 50px;"
                                    type="submit" name="update">Actualizar</button>
                            </div>
</form>

</div>


<?php } ?>
</div>




<!--------->
</div>

                    </div>
                    
                    </div>






                </div>


                <div class="col-lg-1 mt-3">
                </div>


            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <?php require 'partials/global_footer.php' ?>
    
</body>

</html>


<?php } ?>