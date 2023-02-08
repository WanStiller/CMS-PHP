<?php
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.Autor as autor,tblposts.alt_uploaded as alt_uploaded,tblposts.description as description,tblposts.Views as views,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
$query2=mysqli_query($con,"Update tblposts set views=views+1 where id=$pid");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<html lang="<?php echo "$site_lang"; ?>">
<head>
    <meta charset="utf-8">

    <title><?php echo ucwords($row['posttitle']);?></title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!--<meta content="Free HTML Templates" name="keywords">-->
    <meta content="<?php echo ucwords($row['description']);?>" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->

    <meta property="og:image" content="../<?php echo "$uploaded_image";?><?php echo htmlentities($row['PostImage']);?>">
    
    <link href="../template/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="../images/favicon.png">

    <meta property="og:image" content="../<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>">

    <link rel="stylesheet" type="text/css" href="../template/personalized/css/styles.css">


    <?php //Portada Contador
    $pagetype='header-tags';
    $query=mysqli_query($con,"select * from tblpages where PageName='$pagetype'");
    //$query2=mysqli_query($con,"Update tblpages set Vistas=Vistas+1 where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <?php echo $row['Description'];?>
    <?php } ?>
    

    <!-- END ANOTHER TAGS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <script>
function getSubCat(val) {
$.ajax({
type: "POST",
url: "get_subcategory.php",
data:'catid='+val,
success: function(data){
$("#subcategory").html(data);
}
});
}
</script>

<link href="../plugins/summernote/summernote.css" rel="stylesheet" />
<link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />


</head>

<?php } ?>