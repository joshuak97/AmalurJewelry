<?php
include "./config/consulSQL.php";
session_start();
if(!isset($_SESSION['tablaProducto'])){
$_SESSION['tablaProducto']=array();  
$_SESSION['contadorProducto']=0;
}
?>

<script>
    load_carrito();
</script>
     <header id="header" class="sticky-header">
         <div style="background-color:pink">
        <p align="center">ENVIO GRATIS EN COMPRAS MAYORES A $999 MXN</p>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <!-- logo of the page -->
            <div class="logo">
              <a href="index.php"><img src="images/AmalurJewerly/logoAJ.jpeg" alt="AmalurJewerly"></a>
            </div>
            <div class="nav-holder">
              <a class="nav-opener"><span>Menu</span></a>
              <!-- nav of the page -->
              <nav id="nav">
                <ul class="list-unstyled">
                  <li class="<?php echo $home;?>">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="mega-drop <?php echo $tienda;?>">
                    <a href="tienda.php">Tienda</a>
                    <div class="drop-holder">
                      <div class="coll">
                        <strong class="title">Tienda</strong>
                        <ul class="list-unstyled">
                          <li><a href="tienda.php">Tienda</a></li>
                          <li><a href="carrito_compras2.php">Carrito de Compras</a></li>
                          
                         
                         
                        </ul>
                      </div>
                      <!--<div class="coll">
                        <strong class="title">PRODUCTS</strong>
                        <ul class="list-unstyled">
                          <li><a href="#">Basic Products</a></li>
                          <li><a href="#">Simple Products</a></li>
                          <li><a href="#">Varieble Products</a></li>
                          <li><a href="#">Simple Products</a></li>
                        </ul>
                      </div>-->
                      <div class="coll coll-2">
                        <strong class="title">OPORTUNIDAD! </strong>
                        <div class="offer-txt">
                          <span class="txt">Descuentos de hasta</span>
                          <span class="offer-sale">40%</span>
                          
                       
                          
                          <div class="img-holder">
                            <img src="images/AmalurJewerly/amalur-jewelry SVG.svg" alt="image description">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!--<li>
                    <a href="#">blog</a>
                    <ul class="list-unstyled drop">
                      <li><a href="blog.html">Blog</a></li>
                      <li><a href="blog-detail.html">Single Post</a></li>
                    </ul>
                  </li>-->
                  <li class="<?php echo $nosotros;?>"><a href="about-us.html">NOSOTROS</a></li>
                  <li class="<?php echo $contactanos;?>"><a href="contactanos.php">CONTACTANOS</a></li>
                </ul>
              </nav>
              <div class="align-right">
                <!-- social-networks of the page -->
                <ul class="list-unstyled icon-list">
                  <li>
                    <a href="#"><img src="images/user.png" alt="images description"></a>
                  </li>
                  <li class="cart-box">
                    <a class="cart-opener opener-icons" href="#" onclick="load_carrito();">
                      <i class="icon-cart"></i>
                      <div id="cart-num">
                      
                    </div>                    
                    </a>
                    <div class="cart-drop" id="carrito">
                      <div class="cart-holder">
                        <strong class="main-title">Tienes <i>0 articulos</i>en tu carrito</strong>
                        <div class="total-price-area">
                          <span class="title-text">Total</span>
                          <span class="price">$0</span>
                        </div>
                        <span class="cart">Ver carrito</span>
                        <a href="#" class="btn">Comprar</a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a class="btn-search hidden-xs" href="#"><i class="icon-search"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>