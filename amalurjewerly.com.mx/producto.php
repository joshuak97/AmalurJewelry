<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AmalurJewelry|Productos</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/slick.css">
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
  <?php include "inc/header.php";
   $consul_productos=ejecutarSQL::consultar("SELECT * FROM producto  inner join categoria_prod on categoria_prod.id_categoria=producto.id_categoria where codigo='".$_GET['codigo']."'");
   $prods=mysqli_fetch_array($consul_productos);
   
  $imagen=explode(',',$prods['imagen']);
  $numero=count($imagen);       
   
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
      <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(images/AmalurJewerly/bgAmalur.jpg);">
        <span class="sale-percent">SALE OF 50%</span>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                  <h1 class="main-heading">Productos</h1>
                  <ul class="list-unstyled breadcrumbs">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="tienda.php">Tienda</a></li>
                    <li>Productos</li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <span class="year">TRENDS FOR 2016</span>
      </section>
      
      <!-- product-detial of the page -->
      <section class="product-detial wow fadeInUp" data-wow-delay="0.4s">
     
      <!-- Slider of the page -->
        <div class="slider">
         <!-- Product Slider of the page -->
           
          <div class="img-holder product-slider">
             <?php for($i=0;$i<$numero;$i++){
              
              if($imagen[$i]!=""){
              ?>
              <!-- Slide of the page -->
            <div class="slide">
              <img src="https://administracion.amalurjewerly.com.mx/img/img_productos/<?php echo $prods['codigo'].'/'.$imagen[$i];?>" alt="image descrption">
            </div>
           
              <?php }} ?>
            
           </div>
           
          <!-- Pagg Slide of the page -->
          <ul class="list-unstyled slick-slider pagg-slider">
              <?php for($i=0;$i<$numero;$i++){
              
              if($imagen[$i]!=""){
              ?>
            <li> <img src="https://administracion.amalurjewerly.com.mx/img/img_productos/<?php echo $prods['codigo'].'/'.$imagen[$i]?>" alt="image descrption">
            </li>
            
             <?php }} ?>
          </ul>
                        <?php
      if($prods['id_set']!=0){
           
      ?> 
         <div class="form-group">
        <select class="form-control" onchange="cambiar_producto(this);">
            <option value="<?php echo $prods['codigo'];?>"><?php echo $prods['descripcion_prod'];?></option>
            <?php
   $consul_productos_set=ejecutarSQL::consultar("SELECT * FROM producto where  codigo!='".$_GET['codigo']."' and id_set=".$prods['id_set']);
   while($prods_set=mysqli_fetch_array($consul_productos_set)){
       
      ?>
       <option value="<?php echo $prods_set['codigo'];?>"><?php echo $prods_set['descripcion_prod'];?></option>
      <?php
       
   }
   
   
       
   
  ?>
        </select>     
             
         </div>  
         
         <?php
      }
      ?> 
        </div>
       
      
        <!-- Detail Holder of the page -->
        <div class="detial-holder" id="info_prod">
          <h2><?php echo $prods['nombre']?></h2>
          <span class="product-name"><?php echo $prods['nombre_categoria']?></span>
          <!-- Rank Rating of the page -->
          <div class="rank-rating">
            <span class="total-price">$<?php echo number_format($prods['precio_venta'],2);?></span>
            <ul class="list-unstyled rating-list">
              <li><a class="icon-star" href="#"></a></li>
              <li><a class="icon-star" href="#"></a></li>
              <li><a class="icon-star" href="#"></a></li>
              <li><a class="icon-star" href="#"></a></li>
              <li><a class="icon-star" href="#"></a></li>
            </ul>
 
          </div>
          <p><?php echo $prods['descripcion_prod']?></p>
          <p>EL PRECIO DE ARETES ES POR PIEZA, NO POR PAR.</p>
          <div class="txt-wrap">
            <div class="holder">
              <span class="product">Codigo de Producto</span>
              <strong class="product-code"><?php echo $prods['codigo']; ?></strong>
            </div>
           <!-- <div class="holder">
              <span class="size">Size</span>
              <ul class="list-unstyled size-list">
                <li><a href="#">s</a></li>
                <li><a href="#">m</a></li>
                <li><a href="#">l</a></li>
                <li class="active"><a href="#">xl</a></li>
              </ul>
            </div>-->
            <form action="#" class="product-form">
              <fieldset>
                  <?php if($prods['existencia']>0){?>
                <div class="row-val">
                  <label for="qty">Cantidad</label>
                  <input type="number" id="cantidad_prod" value="1" min="1" max="<?php echo $prods['existencia']?>">
                </div>
                <?php }else{
                ?>
                 <div class="row-val">
                  <h3>Producto Agotado</h3>
                </div>
                <?php
                
                }?>
               <!-- <div class="row-val">
                  <label for="clr">color</label>
                  <select id="clr">
                    <option>gold</option>
                  </select>
                </div>-->
              </fieldset>
            </form>
            <div class="holder">
              <ul class="list-unstyled list">
                <li><a href="#"><i class="icon-favorite"></i> Lista de deseos</a></li>
                <li><a href="#"><i class="icon_balance"></i>  compartir</a></li>
              </ul>
            </div>
            <a class="btn-primary"   <?php if($prods['existencia']>0){ echo 'onclick="add_carrito('.$prods['id_producto'].');"';}?>>Agregar al carrito</a>
            <!-- Social Network of the page -->
            <ul class="list-unstyled social-network">
              <li><a class="icon-pinterest" href="#"></a></li>
              <li><a class="icon-twitter" href="#"></a></li>
              <li><a class="icon-facebook" href="#"></a></li>
              <li><a class="icon-google-plus" href="#"></a></li>
            </ul>
          </div>
        </div>
      
      </section>
      
     
      <!-- slider-section of the page -->
     <section class="blockquote-sec wow fadeInUp" data-wow-delay="0.4s" style="background:#fff;">
          <div class="text-center" style="padding:10%"><h2>¡NUEVOS PRODUCTOS!</h2></div>
        <ul class="list-unstyled blockquote-slider">
             <?php 
                          $consul_productos=ejecutarSQL::consultar("SELECT * FROM producto order by fecha_creacion desc limit 6");
                          while ($prods=mysqli_fetch_array($consul_productos)){
                          $imagen_n=explode(',',$prods['imagen']);
                          echo '<li>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <div class="blockquote-holder">
                    <div class="author-img2">
                      <a href="producto.php?codigo='.$prods['codigo'].'"><img src="https://administracion.amalurjewelry.com.mx/img/img_productos/'.$prods['codigo'].'/'.$imagen_n[0].'" alt="image description"></a>
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
  <script>function cambiar_producto(componente){
  var codigo=componente.value;
  window.location.href='producto.php?codigo='+codigo;
  }</script>
  <script src="carrito/carrito.js"></script>
  <a href="https://api.whatsapp.com/send?phone=+527831240516" class="whatsapp"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>

</body>
</html>