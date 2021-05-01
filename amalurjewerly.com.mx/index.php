<!DOCTYPE html>

<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Home</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="shortcut icon" href="images/AmalurJewerly/logoAJ.jpeg" />
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/slick.css">
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
$home="active";
$tienda="";
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
                <input type="search" id="search">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- contain main informative part of the site -->
    <main id="main" role="main">
       <section class="main-slider">
        <!-- social-networks of the page -->
        <ul class="list-unstyled social-network">
          <li class="facebook"><a href="#" class="icon-facebook"></a></li>
          <li><a href="#" class="icon-twitter"></a></li>
          <li class="instagram"><a href="#" class="icon-instagram"></a></li>
        </ul>
        <!-- Main Slider of the page -->
        <div id="main-slider">
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading">Amalur Jewelry</h1>
                      <div class="img-holder">
                        <img src="images/AmalurJewerly/slideAJ.png" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading"><br><br><br></h1>
                      <div class="img-holder">
                        <img src="images/index2.png" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading"><br><br><br><br></h1>
                      <div class="img-holder">
                        <img src="images/index1.png" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
       <!-- blockquote-section of the page -->
      <section class="blockquote-sec wow fadeInUp" data-wow-delay="0.4s" style="background:#fff;">
          <div class="text-center" style="padding:10%"><h2>¡NUEVOS PRODUCTOS!</h2></div>
        <ul class="list-unstyled blockquote-slider">
             <?php 
                          $consul_productos=ejecutarSQL::consultar("SELECT * FROM producto order by fecha_creacion desc limit 6");
                          while ($prods=mysqli_fetch_array($consul_productos)){
                              $imagen=explode(',',$prods['imagen']);
                          echo '<li>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <div class="blockquote-holder">
                    <div class="author-img2">
                      <a href="producto.php?codigo='.$prods['codigo'].'"><img src="https://administracion.amalurjewelry.com.mx/img/img_productos/'.$prods['codigo'].'/'.$imagen[0].'" alt="image description"></a>
                    </div>
                    <h2 class="author-name">'.$prods['nombre'].'.</h2>
                    <p>'.$prods['descripcion_prod'].'</p>
                    <p>$'.$prods['precio_venta'].'</p>
                  </div>
                </div>
              </div>
            </div>
          </li>';
      }
                          ?>
        
          
        </ul>
      </section>
      <HR>
      <!-- main-banner of the page -->
      <section class="banner banner-2 wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(images/AmalurJewerly/bgAmalur.jpg);">
        <span class="sale-percent">Tel: +527831240516</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption-holder">
                  <div class="text-holder">
                    <h1 class="banner-heading">Tu eres la joya.</h1>
                    <strong class="title">Amalur Jewelry</strong>
                    <p>La belleza no solo es como te ves, también es como brillas.</p>
                    <p>Shining with US, Shining with AMALUR.</p>
                   <!-- <a href="about-us.html" class="btn-more">Read more <i class="icon-right-arrow"></i></a>-->
                  </div>
                  <div class="img-holder">
                    <img src="images/AmalurJewerly/AmaluPink.jpg" alt="image description">
                  </div>
                </div>
            </div>
          </div>
        </div>
       </section>
      <!-- product-section of the page -
      <section class="product-sec wow fadeInUp" data-wow-delay="0.4s">
        <div class="product-holder">
          <!-- product-block of the page 
          <div class="product-block coll-1">
            <div class="align-text">
              <span class="title">featured roducts</span>
              <h4 class="product-heading">romantic</h4>
              <p>Pharetra, erat sed fermentum feugiat, velit mauris egestas <br>quam, ut aliquam massa nisl quis neque.</p>
              <a href="product-page.html" class="btn-more">Continue <i class="icon-right-arrow"></i></a>
            </div>
          </div>
          <!-- product-block of the page 
          <div class="product-block block coll-2">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/480x620">
          </div>
          <!-- product-block of the page 
          <div class="product-block block coll-2">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/480x620">
          </div>
        </div>
        <div class="product-holder">
          <!-- product-block of the page 
          <div class="product-block block coll-1">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/960x1235">
          </div>
          <!-- product-block of the page 
          <div class="product-block block coll-1">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/960x620">
          </div>
          <!-- product-block of the page
          <div class="product-block block coll-2">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/480x620">
          </div>
          <!-- product-block of the page 
          <div class="product-block block coll-2">
            <div class="box">
              <a href="product-page.html" class="btn-default">shop now </a>
              <div class="over">
                <div class="holder">
                  <div class="align-left">
                    <strong class="title-name">Goldtone Bib</strong>
                    <strong class="price"><del>150$</del> 120$</strong>
                  </div>
                  <a href="#" class="like">
                    <i class="icon-favorite"></i>
                    23
                  </a>
                </div>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="http://placehold.it/480x620">
          </div>
        </div>
      </section>-->
      <!-- blockquote-section of the page -->
      <section class="blockquote-sec wow fadeInUp" data-wow-delay="0.4s">
        <ul class="list-unstyled blockquote-slider">
          <li>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <!-- Blockquote Holder of the page -->
                  <div class="blockquote-holder">
                    <div class="author-img">
                      <img src="images/AmalurJewerly/MarilynMonroeAJ.jpeg" alt="image description">
                    </div>
                    <h2 class="author-name">Marilyn Monroe.</h2>
                    <p>«Los diamantes son los mejores amigos de las mujeres»</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <!-- Blockquote Holder of the page -->
                  <div class="blockquote-holder">
                    <div class="author-img">
                      <img src="images/AmalurJewerly/JennieKwonAJ.jpeg" alt="image description">
                    </div>
                    <h2 class="author-name">Jennie Kwon.</h2>
                    <p>«Una joya tiene el poder de ser esa cosa pequeña que puede hacerte sentir única».</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <!-- Blockquote Holder of the page -->
                  <div class="blockquote-holder">
                    <div class="author-img">
                      <img src="images/AmalurJewerly/CocoChanelAJ.png" alt="image description">
                    </div>
                    <h2 class="author-name">Coco Chanel.</h2>
                    <p>«Los diamantes pueden ser el mejor amigo de una chica, pero las perlas te haran brillar como la luz de la luna».</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
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
  <script src="carrito/carrito.js"></script>
  
  <a href="https://api.whatsapp.com/send?phone=+527831240516" class="whatsapp"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
</body>
</html>