<?php
session_start();
if($_SESSION['contadorProducto']){
echo '<span class="cart-num">'.$_SESSION['contadorProducto'].'</span>';
}else{
    echo '';
}
?>