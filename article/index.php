<?php 
session_start();
include('../includes/config.php');
if (empty($_SESSION['token'])) {
$_SESSION['token'] = bin2hex(random_bytes(32));
}
if(isset($_POST['submit']))
{
if (!empty($_POST['csrftoken'])) {
if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
echo "<script>alert('Comentario enviado exitosamente; está siendo revisado por nuestro equipo de soporte para aprobar su publicación en el sitio. ');</script>";
unset($_SESSION['token']);
else :
echo "<script>alert('Error. Intentar nuevamente.');</script>";  
endif;
}
}
}
?>
<?php //Muestra datos de usuario
  if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){/**/} else {require("../includes/datos_usuario.php");}
?>
<?php
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.Autor as autor,tblposts.Views as views,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
$query2=mysqli_query($con,"Update tblposts set views=views+1 where id=$pid");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="<?php echo htmlentities($row['posttitle']);?>" name="description">
<meta content="" name="author">
<title><?php echo htmlentities($row['posttitle']);?></title>
<link href="vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="vendor/personalized/css/styles.css">
<link rel="shortcut icon" href="images/favicon.png">
<meta property="og:image" content="admin/postimages/<?php echo htmlentities($row['PostImage']);?>">
</head>
<body>
<?php //require('../includes/header.php'); ESTA LINEA ESTABLECE EL MENU SI ES LOGIN O NO
	if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){include("../includes/header.php");} else {require("../includes/header-log.php");}
?>
<div class="container-fluid mt-4">
<div class="row">
<div class="col-md-10">

<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-image: url(admin/postimages/<?php echo htmlentities($row['PostImage']);?>);width: 100%;height:0;padding-top:25%; background-position: 50% 50%; background-size: cover;position: relative;border: 0px">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="bg-dark" style="color: #DDD">
<div class="card-body">
<?php //require('../includes/header.php'); ESTA LINEA ESTABLECE EL MENU SI ES LOGIN O NO
	if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){include("../includes/article-no.php");} else {require("../includes/article.php");}
?>
</div>
<?php } ?>
</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-2">
	<?php include('../includes/sidebar.php');?>
</div>
</div>
</div>
<?php require('../includes/footer.php');?>
<script src="../vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>