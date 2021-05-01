<<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>AMALUR JEWELRY</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
    include "inc/header.php";
    ?>
    <!-- Search Popup of the page -->
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
      <section class="banner" style="background-image: url(images/AmalurJewerly/bgAmalur.jpg);">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading heading-1">Datos de envio</h1>
                 
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2016</span>
      </section>
      <!-- form-section of the page -->
      <section class="form-sec" >
        
              <form action="carrito_compras.php" method="post" class="contact-form">
          <fieldset>
            <div class="form-group">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
            </div>
            <div class="form-group">
              <input type="email" name="correo" class="form-control" placeholder="correo@ejemplo.com" required>
            </div>
            <div class="form-group">
              <input type="text" name="calle" class="form-control" placeholder="Calle" required>
            </div>
            <div class="form-group">
              <input type="number" name="numero_ext" class="form-control" placeholder="N Exterior" required>
            </div>
            
           <div class="form-group">
              <input type="number" name="numero_int" class="form-control" placeholder="N Interior(Opcional)" >
            </div> 
            
            
            
            <div class="form-group">
              <input type="text" name="colonia" class="form-control" placeholder="Colonia / Asentamiento" required>
            </div>
            
            <div class="form-group">
              <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" required>
            </div>
            
             <div class="form-group">
              <input type="text" name="estado" class="form-control" placeholder="Estado" required>
            </div>
            
             <div class="form-group">
              <input type="text" name="pais" class="form-control" placeholder="Pais" required>
            </div>
            
             <div class="form-group">
              <input type="text" name="cp" class="form-control" placeholder="Codigo Postal" required>
            </div>
            
            <div class="form-group">
             
              <button class="btn-primary btn-login" type="submit">Agregar</button>
            </div>
             <div class="form-group text-center">
             
              
            </div>
          </fieldset>
        </form>
       
         
      </section>
    </main>
     <!-- footer of the Page -->
    <footer id="footer" class="wow fadeInUp" data-wow-delay="0.4s">
      <span class="free-ship">Amalur Jewelry</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-lg-4 txt-holder">
            <div class="footer-logo">
              <a href="index.html">Amalur Jewelry</a>
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
  <a href="https://api.whatsapp.com/send?phone=7831240516" class="whatsapp"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
  <script src="carrito/carrito.js"></script>
</body>
</html>