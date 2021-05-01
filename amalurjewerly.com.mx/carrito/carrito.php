<?php
session_start();
include('../config/consulSQL.php');
    $validar=0;
  
if(isset($_POST['id_producto'])){

    $conProd=ejecutarSQL::consultar("SELECT*FROM producto WHERE id_producto=".$_POST['id_producto']); 
   
    $prods=mysqli_fetch_array($conProd);
   
    
    $cantidad=$_POST['cantidad'];    

    if($_SESSION['contadorProducto']>0){
    for($x=0;$x<$_SESSION['contadorProducto'];$x++){
    if( $_SESSION['tablaProducto'][$x]==$_POST['id_producto']){
    $validar=1;
    $auxiliar=$x;
    }
    }
    if($validar==0){
    $_SESSION['cantidad'][$_SESSION['contadorProducto']]=$cantidad;
    $_SESSION['tablaProducto'][$_SESSION['contadorProducto']] = $_POST['id_producto'];
    $_SESSION['precio_venta'][$_SESSION['contadorProducto']] = $prods['precio_venta'];
    $_SESSION['contadorProducto']++;
    
    }else{
    
    }
    }else{
        $_SESSION['cantidad'][$_SESSION['contadorProducto']]=$cantidad;
        $_SESSION['tablaProducto'][$_SESSION['contadorProducto']] = $_POST['id_producto'];
        $_SESSION['precio_venta'][$_SESSION['contadorProducto']] = $prods['precio_venta'];
        $_SESSION['contadorProducto']++;   
    }
    if($_SESSION['contadorProducto']>0){
    $suma=0;
    
    echo '     <div class="cart-holder">
                        <strong class="main-title">You have <i>'.$_SESSION['contadorProducto'].' items</i> in your card</strong>
                        <ul class="cart-list list-unstyled">';
                        for($i=0;$i<$_SESSION['contadorProducto'];$i++){
                         $consulta=ejecutarSQL::consultar("select * from producto where id_producto=".$_SESSION['tablaProducto'][$i]);
                          while($fila=mysqli_fetch_array($consulta)){
                              $imagen=explode(',',$fila['imagen']);
                        echo '<li>
                            <div class="image">
                              <a href="#"><img alt="Image Description" src="https://administracion.amalurjewerly.com.mx/img/img_productos/'.$fila['codigo'].'/'.$imagen[0].'"></a>
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
                        <div class="total-price-area" id="suma_total">
                          <span class="title-text">Total</span>
                          <span class="price" >$'.$_SESSION['sumaTotal'].'</span>
                        </div>
                        
                        <a href="pagar.php" class="btn">Pagar</a>
                      </div>';


        
    
} 
}else{
       $suma=0;
   echo '     <div class="cart-holder">
                        <strong class="main-title">You have <i>'.$_SESSION['contadorProducto'].' items</i> in your card</strong>
                        <ul class="cart-list list-unstyled">';
                        for($i=0;$i<$_SESSION['contadorProducto'];$i++){
                         $consulta=ejecutarSQL::consultar("select * from producto where id_producto=".$_SESSION['tablaProducto'][$i]);
                          while($fila=mysqli_fetch_array($consulta)){
                              $imagen=explode(',',$fila['imagen']);
                        echo '<li>
                            <div class="image">
                              <a href="#"><img alt="Image Description" src="https://administracion.amalurjewerly.com.mx/img/img_productos/'.$fila['codigo'].'/'.$imagen[0].'"></a>
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
}
  

?>