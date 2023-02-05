<?php



    //$site_description="NONE";
    //$site_lang="zg";
    
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'gestor');
	$con=@mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos! </h2>".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        @die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

// PUBLICIDAD

    function add1(){ //PUBLICIDAD DEL HEADER
                    echo '<a href="index.php"><img class="img-fluid w-100" src="template/img/ads-728x90.png" alt="Lana Rhoades"></a>';
                }; 

    function add2(){ //PUBLICIDAD DEL HEADER
                    echo '<a href="index.php"><img class="img-fluid w-100" src="template/img/ads-728x90.png" alt="Lana Rhoades"></a>';
                };

    function add3(){ //PUBLICIDAD DEL HEADER
                    echo '<a href="index.php"><img class="img-fluid w-100" src="template/img/ads-728x90.png" alt="Lana Rhoades"></a>';
                }; 

 // RUTA DE LA IMAGEN SUBIDA

    $uploaded_image = "uploads/";


//LANGUAGE CONFIGURATION
?>

    <?php //name_site
    $pagetype='lang';
    $query=mysqli_query($con,"select * from tblwords where PageName='$pagetype'");
    while($row=mysqli_fetch_array($query))
    {
    $site_lang=$row['Description'];
    ?>
    <?php } ?>