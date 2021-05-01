<?php
session_start();
include "../consulSQL.php";
$id_entrada=$_POST['id_producto'];

$ver=ejecutarSQL::consultar("SELECT * from producto  where id_producto=".$id_producto);
$entrada=mysqli_fetch_array($ver);
if(consultasSQL::DeleteSQL("producto","id_producto=$id_entrada")){
$verProd=ejecutarSQL::consultar("SELECT * from producto  where id_producto=".$entrada['id_producto']);
$prod=mysqli_fetch_array($verProd);
$nueva_existencia=$prod['existencia']-$entrada['cantidad'];
consultasSQL::UpdateSQL("producto","existencia=$nueva_existencia","id_producto=".$prod['id_producto']);
header("Location: ../../home.php?modulo=entradas_producto&alert=2");

}else{
header("Location: ../../home.php?modulo=entradas_producto&alert=3");
    	    
	
}

?>