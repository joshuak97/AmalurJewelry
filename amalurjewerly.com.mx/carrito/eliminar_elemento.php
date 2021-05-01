<?php
session_start();
include('../config/consulSQL.php');

$id_producto=$_POST['id_producto'];
$posicion=0;
for($i=0;$i<$_SESSION['contadorProducto'];$i++){

if($i<$_SESSION['contadorProducto']-1){
if($posicion==0){  
if($_SESSION['tablaProducto'][$i]==$id_producto){

$_SESSION['tablaProducto'][$i]=$_SESSION['tablaProducto'][$i+1];		
$_SESSION['cantidad'][$i]=$_SESSION['cantidad'][$i+1];
$_SESSION['precio_venta'][$i]=$_SESSION['precio_venta'][$i+1];
$posicion++;
}
}else if($posicion>0){
$_SESSION['tablaProducto'][$i]=$_SESSION['tablaProducto'][$i+1];		
$_SESSION['cantidad'][$i]=$_SESSION['cantidad'][$i+1]; 
$_SESSION['precio_venta'][$i]=$_SESSION['precio_venta'][$i+1]; 
}else{
  
}
}else{
	$_SESSION['contadorProducto']=$_SESSION['contadorProducto']-1;
}

}

     $suma=0;
   echo '     <div class="cart-holder">
                        <strong class="main-title">You have <i>'.$_SESSION['contadorProducto'].' items</i> in your card</strong>
                        <ul class="cart-list list-unstyled">';
                        for($i=0;$i<$_SESSION['contadorProducto'];$i++){
                         $consulta=ejecutarSQL::consultar("select * from producto where id_producto=".$_SESSION['tablaProducto'][$i]);
                          while($fila=mysqli_fetch_array($consulta)){
                        echo '<li>
                            <div class="image">
                              <a href="#"><img alt="Image Description" src="https://administracion.amalurjewerly.com.mx/img/img_productos/'.$fila['codigo'].'/'.$fila['imagen'].'"></a>
                            </div>
                            <div class="description">
                              <span class="product-name"><a href="#">'.$fila['nombre'].'</a></span>
                              <span class="price">'.$fila['precio_venta'].'</span>
                            </div>
                              <div class="description">
                            <span class="product-name">cantidad</span>
                              <span class="product-name"><input type="number" onchange="modificar_cantidad(this,'.$i.');" min="1" value="'.$_SESSION['cantidad'][$i].'" max="'.$fila['existencia'].'"></span>
                              
                            </div>
                            <a class="icon-close" onclick="eliminar_carrito('.$fila['id_producto'].');"></a>
                          </li>';
                          $suma +=$_SESSION['precio_venta'][$i]*$_SESSION['cantidad'][$i];
                        }
                        }
                         $_SESSION['sumaTotal']=$suma;
                        echo '</ul>
                        <div class="total-price-area">
                          <span class="title-text">Total</span>
                          <span class="price" id="suma_total">$'.$_SESSION['sumaTotal'].'</span>
                        </div>
                        <span class="cart"></span>
                        <a href="pagar.php" class="btn">Pagar</a>
                      </div>';


?>