<?php
session_start();
include('../config/consulSQL.php');


   $consul_productos=ejecutarSQL::consultar("SELECT * FROM producto  inner join categoria_prod on categoria_prod.id_categoria=producto.id_categoria where codigo='".$_POST['codigo']."'");
   $prods=mysqli_fetch_array($consul_productos);
   
  $imagen=explode(',',$prods['imagen']);
  $numero=count($imagen);       
   


?>

   
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
       