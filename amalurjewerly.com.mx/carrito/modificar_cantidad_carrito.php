<?php
session_start();

$_SESSION['cantidad'][$_POST['posicion']]=$_POST['cantidad'];
$suma=0;
for($i=0;$i<$_SESSION['contadorProducto'];$i++){  
$suma +=$_SESSION['precio_venta'][$i]*$_SESSION['cantidad'][$i];    
}
$_SESSION['sumaTotal']=$suma;
echo '<span class="title-text">Total</span>
                          <span class="price" >$'.$_SESSION['sumaTotal'].'</span>';