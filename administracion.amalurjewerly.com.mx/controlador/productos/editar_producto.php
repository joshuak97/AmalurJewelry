<?php
session_start();
include "../consulSQL.php";

$id_producto=$_POST['id_producto'];
$codigo=$_POST['codigo'];
$descripcion=$_POST['descripcion'];
$nombre_producto=$_POST['nombre_producto'];
$precio_compra=$_POST['precio_compra'];
$precio_venta=$_POST['precio_venta'];
$id_categoria=$_POST['id_categoria'];
$id_categoria=$_POST['existencia'];
$seccion=$_POST['seccion'];
$descuento=$_POST['descuento'];
$img=$codigo.".jpg";
$count=0;
if(!$_FILES['img']['name']==""){
    if($_FILES['img']['type']=="image/jpeg" || $_FILES['img']['type']=="image/png"){
if(move_uploaded_file($_FILES['img']['tmp_name'],"../../img/img_productos/".$img)){
 if(!consultasSQL::UpdateSQL("producto", "imagen='$img'", "id_producto=$id_producto")){
 $count++;   
 }  
}else{
$count++;     
}
}else{
$count++;    
}
}

if($count==0){

if(consultasSQL::UpdateSQL("producto", "codigo='$codigo',descripcion_prod='$descripcion',nombre='$nombre_producto',precio_venta='$precio_venta',precio_compra='$precio_compra', id_categoria='$id_categoria',seccion='$seccion',descuento='$descuento'", "existencia='$existencia'","id_producto=$id_producto")){
header("Location: ../../home.php?modulo=inventario&alert=9");   
    }else{
   header("Location: ../../home.php?modulo=inventario&alert=10");    	
    }	
	
}else{
 header("Location: ../../home.php?modulo=inventario&alert=7");     
}

?>