<?php
session_start();
$total=$_SESSION['precio_venta'][$_POST['posicion']]*$_SESSION['cantidad'][$_POST['posicion']];
echo '$'.number_format($total,2);
?>