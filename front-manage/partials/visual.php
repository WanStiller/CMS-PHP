<!DOCTYPE html>
<?php //name_site
    $pagetype='lang';
    $query=mysqli_query($con,"select * from tblwords where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <html lang="<?php echo $row['Description'];?>">
    <?php } ?>
    <head>
        
    <meta charset="utf-8">
    <?php //name_site
    $pagetype='site_name';
    $query=mysqli_query($con,"select * from tblwords where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <title><?php echo $row['Description'];?></title>
    <?php } ?>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!--<meta content="Free HTML Templates" name="keywords">-->
    <?php //name_site
    $pagetype='description_site';
    $query=mysqli_query($con,"select * from tblwords where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <meta content="<?php echo $row['Description'];?>" name="description">
    <?php } ?>
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
    <link href="template/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png">
    <meta property="og:image" content="images/preview.png">

    <link rel="stylesheet" type="text/css" href="template/personalized/css/styles.css">

    <!--ANOTHER TAGS-->

    <?php
    $pagetype='header-tags';
    $query=mysqli_query($con,"select * from tblpages where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <?php echo $row['Description'];?>
    <?php } ?>
    

    <!-- END ANOTHER TAGS -->

</head>