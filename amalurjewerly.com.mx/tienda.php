<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Tienda</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="style.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/color/color.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
  <!-- Page Loader -->
  <div id="pre-loader" class="loader-container">
    <div class="loader">
      <img src="images/svg/rings.svg" alt="loader">
    </div>
  </div>
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <!-- header of the page -->
    <?php
$home="";
$tienda="active";
$nosotros="";
$contactanos="";
    include "inc/header.php";?>
    <!-- Search Popup of the page -->
    <div class="search-popup">
      <div class="holder">
        <div class="col">
          <div class="block-holder">
            <a href="#" class="close-btn"><i class="icon-close"></i></a>
            <form action="#" class="submit-form">
              <fieldset>
                <label for="search" class="icon-search"></label>
                <input type="search" placeholder="Search">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- contain main informative part of the site -->
    <main id="main" role="main">
      <!-- main-banner of the page -->
      <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(images/AmalurJewerly/bgAmalur.jpg);">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading">Tienda</h1>
                  <ul class="list-unstyled breadcrumbs">
                    <li class="<?php echo $home;?>"><a href="index.php">Inicio</a></li>
                    <li class="<?php echo $tienda;?>">Tienda</li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2021</span>
      </section>
      <!-- product-section of the page -->
      <section class="product-sec wow fadeInUp" data-wow-delay="0.4s">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <ul class="list-unstyled filter-list">
                <li class="active"><a href="#">all</a></li>
                <?php
                  $consul_cat=ejecutarSQL::consultar("SELECT * FROM categoria_prod order by nombre_categoria asc");
                while($cat=mysqli_fetch_array($consul_cat)){
                echo '<li><a href="#" data-filter=".cat'.$cat['id_categoria'].'">'.$cat['nombre_categoria'].'</a></li>';    
                    
                }
              
                
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="holder" id="masonry-container">
            <!-- product-block of the page -->
            
            <?php
            $consul_productos=ejecutarSQL::consultar("SELECT * FROM producto order by fecha_creacion desc");
                          while($prods=mysqli_fetch_array($consul_productos)){
                         $imagen=explode(',',$prods['imagen']);     
          
         
          
          
          echo '<div class="product-block coll-2 cat'.$prods['id_categoria'].' necklaces">
            <div class="over">
              <div class="align-left">
                <strong class="title-name"><a href="producto.php?codigo='.$prods['codigo'].'">'.$prods['nombre'].'</a></strong>';
                if($prods['seccion']=='OFERTAS'){
                     $descuento=$prods['descuento']/100*$prods['precio_venta'];
                     $desc=number_format($descuento+$prods['precio_venta'],2);
                echo '<strong class="price"><del>$'.$desc.'</del> $'.$prods['precio_venta'].'</strong>';
                }else{
                echo '<strong class="price"> $'.$prods['precio_venta'].'</strong>';    
                }
              echo '</div>
              
            </div>
            <img class="img-responsive" alt="'.$prods['descripcion_prod'].'" src="https://administracion.amalurjewerly.com.mx/img//img_productos/'.$prods['codigo'].'/'.$imagen[0].'" >
          </div>';

                     }
            ?>

        
        </div>
      </section>
    </main>
    <!-- footer of the Page -->
    <footer id="footer" class="wow fadeInUp" data-wow-delay="0.4s">
      <span class="free-ship">Amalur Jewelry</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-lg-4 txt-holder">
            <div class="footer-logo">
              <a href="index.php">Amalur Jewelry</a>
            </div>
            <p>Shining WITH US!</p>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-3">
            <h3>Contactanos</h3>
            <!-- Contact of the page -->
            <ul class="list-unstyled contact-info">
              <li><i class="icon icon-location"></i><address>Calle Vicente Guerrero 31, colonia centro, Tuxpan, Veracruz</address></li>
              <li><i class="icon icon-email"></i><a class="txt" href="#">ventas@amalurjewelry.com.mx</a></li>
              <li><i class="icon icon-phone"></i><a class="txt" href="#">+527831240516</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-5">
            <h3>intagram feed</h3>
            <!-- Instagram of the page -->
            <ul class="list-unstyled instagram-list">
              <li><a href="#"><img height=10px width=10px src="images/AmalurJewerly/AJI1.jpeg" alt="image description"></a></li>
              <li><a href="#"><img height=10px width=10px src="images/AmalurJewerly/AJI3.jpeg" alt="image description"></a></li>
              <li><a href="#"><img height=10px width=10px src="images/AmalurJewerly/AJI4.jpeg" alt="image description"></a></li>
              <li><a href="#"><img height=10px width=10px src="images/AmalurJewerly/AJI2.jpeg" alt="image description"></a></li>
              
              </ul>
          </div>
        </div>
      </div>
      <span class="support">Amalur Jewelry</span>
    </footer>
    
    <!-- Back Top of the page -->
    <span id="back-top" class="arrow_carrot-up"></span>
  </div>
  <!-- include jQuery -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script src="carrito/carrito.js"></script>

  <a href="https://api.whatsapp.com/send?phone=+527831240516" class="whatsapp"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
</body>
</html>