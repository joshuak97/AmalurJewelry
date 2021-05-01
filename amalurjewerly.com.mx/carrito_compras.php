<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Carrito</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="style.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/animate.css">
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
    <?php
    include "inc/header.php";
    if($_POST['numero_int']!=""){
    $int=" INT ".$_POST['numero_int'];    
    }else{
    
    $int="";    
        
    }
    $_SESSION['email']=$_POST['email'];
    $_SESSION['nombre']=$_POST['nombre'];
    $_SESSION['direccion']=$_POST['id_direccion'].' '.$_POST['calle']." No. Exterior ".$_POST['numero_ext']." ".$int." ".$_POST['colonia']." ".$_POST['ciudad']." ".$_POST['estado']." ".$_POST['pais']." ".$_POST['cp'];
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
      <section class="banner" style="background-image: url(http://placehold.it/1920x1000);">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading heading-2">Carrito de Compras</h1>
                  <ul class="list-unstyled breadcrumbs">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="tienda.php">Tienda</a></li>
                    <li>Contact</li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2016</span>
      </section>
      <!-- shoping-cat-detail of the page -->
      <section class="shoping-cat-detail">
        <div class="container">
          <div class="row wow fadeInUp" data-wow-delay="0.4s">
            <div class="col-xs-12 col-sm-2">
              <span class="title">Producto</span>
            </div>
            <div class="col-xs-12 col-sm-3">
              <span class="title">Descripcion</span>
            </div>
            <div class="col-xs-12 col-sm-2">
              <span class="title">precio</span>
            </div>
            <div class="col-xs-12 col-sm-3">
              <span class="title">Cantidad</span>
            </div>
            <div class="col-xs-12 col-sm-2">
              <span class="title">total</span>
            </div>
          </div>
          <hr>
          <?php
         
           for($i=0;$i<$_SESSION['contadorProducto'];$i++){
               $total=0;
                         $consulta=ejecutarSQL::consultar("select * from producto where id_producto=".$_SESSION['tablaProducto'][$i]);
                          while($fila=mysqli_fetch_array($consulta)){
                              $imagen=explode(',',$fila['imagen']);
                              $total=$fila['precio_venta']*$_SESSION['cantidad'][$i];
                           echo '
                            <div class="row wow fadeInUp" data-wow-delay="0.4s">
            <div class="detail-holder">
              <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                  <img src="https://administracion.amalurjewerly.com.mx/img/img_productos/'.$fila['codigo'].'/'.$imagen[0].'"  alt="image descripton">
                </div>
              </div>
              <div class="col-xs-12 col-sm-3">
                <span class="txt">'.$fila['nombre'].'</span>
              </div>
              <div class="col-xs-12 col-sm-2">
                <span class="txt">'.$fila['precio_venta'].'</span>
              </div>
              <div class="col-xs-12 col-sm-3">
                <input type="number" class="form-control" value="'.$_SESSION['cantidad'][$i].'" min="1" max="'.$fila['existencia'].'" onclick="modificar_cantidad2(this,'.$i.');" onchange="modificar_cantidad2(this,'.$i.');" onkeyup="modificar_cantidad2(this,'.$i.');">
              </div>
              <div class="col-xs-12 col-sm-2">
                <span class="txt" id="total'.$i.'">$'.number_format($total,2).'</span>
              </div>
            </div>
          </div>
          <hr>';   
                          }
               
           }
          ?>
          
         
          <div class="row total-pay wow fadeInUp" data-wow-delay="0.4s">
           <div class="col-xs-12 col-sm-7">
            <!--  <strong class="title">coupon</strong>
              <form action="#" class="form">
                <fieldset>
                  <input type="text" placeholder="Enter promotion code here" class="form-control">
                  <button type="submit" class="btn">apply</button>
                </fieldset>
              </form>
              <a href="#" class="btn-more">Continue <i class="icon-right-arrow"></i></a>-->
            </div>
            <div class="col-xs-12 col-sm-5">
              <div class="total-amunt">
                <div class="holder">
                  <strong class="heading">Subtotal</strong>
                  <span class="price" id="suma_total2">$<?php echo number_format($_SESSION['sumaTotal'],2);?></span>
                </div>
                <div class="holder">
                  <strong class="heading">Nota:</strong>
                  <span class="price">Si su compra no es mayor a $999.00 se cobraran $150.00 en gastos de envío.</span>
                </div>
                <div class="holder">
                  <strong class="heading">total</strong>
                  <span class="price" id="suma_total3">$<?php echo number_format($_SESSION['sumaTotal'],2);?></span>
                </div>
                 <?php include 'carrito/paypal/paypalCheckout.php'; ?>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- footer of the Page -->
    <footer id="footer" class="wow fadeInUp" data-wow-delay="0.4s">
      <span class="free-ship">FREE SHIPPING</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-lg-4 txt-holder">
            <div class="footer-logo">
              <a href="index.html">jewelry</a>
            </div>
            <p>Pharetra, erat sed fermentum<br> feugiat, velit mauris egestas<br> quam. </p>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-3">
            <h3>contact us</h3>
            <!-- Contact of the page -->
            <ul class="list-unstyled contact-info">
              <li><i class="icon icon-location"></i><address>Limited. 222-UTC , EU .</address></li>
              <li><i class="icon icon-email"></i><a class="txt" href="#">upport@emtheme.com</a></li>
              <li><i class="icon icon-phone"></i><a class="txt" href="#">(00)-213 1234567</a></li>
              <li><i class="icon icon-printer"></i><a class="txt" href="#">(00)-213 1879017</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-5">
            <h3>intagram feed</h3>
            <!-- Instagram of the page -->
            <ul class="list-unstyled instagram-list">
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
              <li><a href="#"><img src="http://placehold.it/95x70" alt="image description"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <span class="support">24H SUPPORT</span>
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