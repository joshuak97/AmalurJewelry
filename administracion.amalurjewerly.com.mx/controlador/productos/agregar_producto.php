<?php
session_start();
include "../consulSQL.php";
ini_set('date.timezone','America/Mexico_City');

$codigo=$_POST['codigo'];
$nombre_producto=$_POST['nombre_producto'];
$descripcion=$_POST['descripcion'];
$precio_compra=$_POST['precio_compra'];
$precio_venta=$_POST['precio_venta'];
$id_categoria=$_POST['id_categoria'];
$descuento=$_POST['descuento'];
$existencia=$_POST['existencia'];
$seccion=$_POST['seccion'];
$fecha_creacion=date('d-m-Y H:i:s',time());
$img="";


$consul_producto=  ejecutarSQL::consultar("SELECT * FROM producto WHERE codigo='".$codigo."'");
$num=mysqli_num_rows($consul_producto);

if ($num>0) {
	header("Location: ../../home.php?modulo=inventario&alert=5");
}else{
  $contador_img=1; 
  $validar=0;
  $directorio="../../img/img_productos/$codigo/";
  if(!file_exists($directorio)){
        mkdir($directorio, 0777);
      
   foreach($_FILES["img"]['tmp_name'] as $key => $tmp_name)
  {
if(!$_FILES['img']['name'][$key]==""){
if($_FILES['img']['type'][$key]=="image/jpeg" || $_FILES['img']['type'][$key]=="image/png"){
 $dir=opendir($directorio);
 $img.=$codigo."-$contador_img.jpg,";
	if(!move_uploaded_file($_FILES['img']['tmp_name'][$key],"../../img/img_productos/$codigo/$codigo".'-'."$contador_img.jpg")){
     $validar=1;  
	
	} closedir($dir);
	
}else{
$validar=1;
}	

}else{
	header("Location: ../../home.php?modulo=inventario&alert=6");
}
$contador_img++;
}

if($validar==0){
if(consultasSQL::InsertSQL("producto", "codigo,nombre,descripcion_prod,precio_compra,precio_venta,id_categoria,imagen,fecha_creacion,seccion,descuento,existencia", "'$codigo','$nombre_producto','$descripcion','$precio_compra','$precio_venta','$id_categoria','$img','$fecha_creacion','$seccion','$descuento','$existencia'")){
header("Location: ../../home.php?modulo=inventario&alert=4");	

    }else{
    echo "<br><div class='alert alert-danger alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <div class='text-center'><h4>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h4></div>
        Error al insertar, por favor intente de nuevo.
        </div>";	
    }    
    
}else{
    
 header("Location: ../../home.php?modulo=inventario&alert=7");   
}
}else{
 header("Location: ../../home.php?modulo=inventario&alert=10");   
}
}
?>