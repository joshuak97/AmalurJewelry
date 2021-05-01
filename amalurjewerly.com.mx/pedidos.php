<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Pedidos</title>
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
   <?php include "inc/header.php";?>
    <div class="search-popup">
      <div class="holder">
        <div class="col">
          <div class="block-holder">
            <a href="#" class="close-btn"><i class="icon-close"></i></a>
            <form action="#" class="submit-form">
              <fieldset>
                <label for="search" class="icon-search"></label>
                <input type="search" id="search">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- contain main informative part of the site -->
    <main id="main" role="main">
      <!-- main-banner of the page -->
      <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(http://placehold.it/1920x1000);">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading">Mis pedidos</h1>
                  <ul class="list-unstyled breadcrumbs">
                    <li><a href="index.php">Inicio</a></li>
                    <li>Mis pedidos</li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2016</span>
      </section>
      <!-- Blog Detail of the page -->
     
      <!-- Comment Section of the page -->
      <section class="comment-sec">
        <div class="container">
          <div class="row">
              <h1 class="blog-heading">Mis Pedidos</h1>
            <div class="col-xs-12">
              
              <ul class="list-unstyled">
                  <?php
                   $consul_productos=ejecutarSQL::consultar("SELECT * FROM pedidos order by fecha_pedido desc");
                          while($prods=mysqli_fetch_array($consul_productos)){
                            
                  ?>
                <li>
                 
                  <!-- Comment Info of the page -->
                  <div class="comment-info">
                    <div class="header">
                      <div class="heading">
                        <h2>Detalles del pedido: <?php echo $prods['folio_pedido'];?></h2>
                        <time class="time" datetime="<?php echo $prods['fecha_pedido'];?>"></time>
                      </div>
                      
                    </div>
                    <p><?php 
                    
                    if($prods['detalles_envio']!=""){
                    echo $prods['detalles_envio'];
                    }else{
                        echo 'Estamos preparando su pedido...';
                    }
                    ?></p>
                    
                       <?php
                   $consul_productos2=ejecutarSQL::consultar("SELECT * FROM pedido_producto inner join producto on producto.id_producto=pedido_producto.id_producto where id_pedido=".$prods['id_pedido']);
                          while($prods2=mysqli_fetch_array($consul_productos2)){
                              
                            
                  ?>
                 <p><?php echo $prods2['cantidad']." X ".$prods2['descripcion_prod']?></p> 
                  <?php
                          }
               ?>
                    
                  </div>
                </li>
               <?php
                          }
               ?>
              </ul>
              <!-- Leave Comment of the page -->
            
            </div>
          </div>
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
  <script src="carrito/carrito.js"></script>
</body>
</html>