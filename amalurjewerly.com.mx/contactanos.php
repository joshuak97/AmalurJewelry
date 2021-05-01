<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Contactanos</title>
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
    <?php include "inc/header.php";?>
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
      <section class="banner" style="background-image: url(images/AmalurJewerly/bgAmalur.jpg)">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading heading">CONTACTANOS
                  </h1>
                  <ul class="list-unstyled breadcrumbs">
                    <li><a href="index.php">HOME | </a></li>
                    <li><a href="tienda.php">TIENDA | </a></li>
                    <li>CONTACTANOS</li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2016</span>
      </section>
      <!-- Contact Section of the page -->
      <section class="contact-sec">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211.64954987858567!2d-97.40009919738158!3d20.95241912730097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d98a8bf48a6b23%3A0x12fedab22bbb1981!2sVicente%20Guerrero%2031%2C%20Centro%2C%2092800%20T%C3%BAxpam%20de%20Rodr%C3%ADguez%20Cano%2C%20Ver.!5e1!3m2!1ses-419!2smx!4v1616287453476!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>
        <div class="text-holder">
          <div class="txt-frame">
            <div class="holder">
              <div class="contact-detail">
                <h3>Detalle de Contacto</h3>
                <ul class="list-unstyled contact-info">
                  <li><i class="icon icon-location"></i><address>Calle Vicente Guerrero 31, colonia centro, Tuxpan, Veracruz</address></li>
                  <li><i class="icon icon-email"></i><a class="txt" href="#">ventas@amalurjewelry.com.mx</a></li>
                  <li><i class="icon icon-phone"></i><a class="txt" href="#">+527831240516</a></li>
                </ul>
              </div>
              
            </div>
            <div class="holder">
              <h3>Dejanos un mensaje

              </h3>
              <!-- main-form of the page -->
              <form action="#" action="process/contactanos.php" method="post" class="contact-form">
                <fieldset>
                  <div class="form-group">
                    <div class="col">
                      <input type="text" class="form-control"  name="nombre" placeholder="Primer nombre">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="apellidos" placeholder="Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Correo">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="asunto" placeholder="Asunto">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="mensaje" placeholder="Escribe tu mensaje aquí"></textarea>
                  </div>
                  <button class="btn-primary btn-submit" type="submit">Enviar Mensaje</button>
                </fieldset>
              </form>
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
  <a href="https://api.whatsapp.com/send?phone=+527831240516" class="whatsapp"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
</body>
</html>