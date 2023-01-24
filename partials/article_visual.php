<?php
$pid=intval($_GET['nid']);
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
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->

    <meta property="og:image" content="<?php echo "$uploaded_image";?><?php echo htmlentities($row['PostImage']);?>">
    
    <link href="template/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png">

    <meta property="og:image" content="<?php echo "$uploaded_image"; ?><?php echo htmlentities($row['PostImage']);?>">

    <link rel="stylesheet" type="text/css" href="template/personalized/css/styles.css">


</head>

<?php } ?>