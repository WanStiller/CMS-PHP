<?php 
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,
    "select tblposts.id as pid,
    tblposts.PostTitle as posttitle,
    tblposts.Autor as autor,
    tblposts.Views as views,
    tblposts.alt_uploaded as alt_uploaded,
    tblposts.Description as description,
    tblposts.PostImage,
    tblcategory.CategoryName as category,
    tblposts.slug as slug,
    tblcategory.id as cid,
    tblsubcategory.Subcategory as subcategory,
    tblposts.PostDetails as postdetails,
    tblposts.PostingDate as postingdate,
    tblposts.PostUrl as url from tblposts
    left join tblcategory on tblcategory.id=tblposts.CategoryId
    left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId
    where tblposts.Is_Active=1
    order by tblposts.views desc LIMIT $offset, $no_of_records_per_page");

