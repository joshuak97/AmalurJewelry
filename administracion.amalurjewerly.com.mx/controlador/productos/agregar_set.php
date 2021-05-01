<?php
session_start();
include "../consulSQL.php";
ini_set('date.timezone','America/Mexico_City');


$nombre_producto=$_POST['nombre_producto'];

$precio_compra=$_POST['precio_compra'];
$precio_venta=$_POST['precio_venta'];
$id_categoria=$_POST['id_categoria'];
$descuento=$_POST['descuento'];
$validar2=0;
$validar3=0;
$seccion=$_POST['seccion'];
$fecha_creacion=date('d-m-Y H:i:s',time());
$img="";
if(consultasSQL::InsertSQL("sets", "nombre_set,creation_fecha", "'$nombre_producto','$fecha_creacion'")){
    
$consul_set=  ejecutarSQL::consultar("SELECT * FROM sets order by id_set desc limit 1");
$set=mysqli_fetch_array($consul_set);
$id_set=$set['id_set'];

for($x=0;$x<$_COOKIE["var"];$x++){
$codigo=$_POST['codigo'][$x];
$descripcion=$_POST['descripcion'][$x];
$existencia=$_POST['stock'][$x];
$consul_producto=  ejecutarSQL::consultar("SELECT * FROM producto WHERE codigo='".$codigo."'");

$num=mysqli_num_rows($consul_producto);

if ($num>0) {
	$validar3++;
}else{
  $contador_img=1; 
  $validar=0;
  $directorio="../../img/img_productos/$codigo/";
  if(!file_exists($directorio)){
        mkdir($directorio, 0777);
      
 
if(!$_FILES['img']['name'][$x]==""){
if($_FILES['img']['type'][$x]=="image/jpeg" || $_FILES['img']['type'][$x]=="image/jpg" || $_FILES['img']['type'][$x]=="image/png"){
 $dir=opendir($directorio);
 $img=$codigo."-$contador_img.jpg,";
	if(!move_uploaded_file($_FILES['img']['tmp_name'][$x],"../../img/img_productos/$codigo/$codigo".'-'."$contador_img.jpg")){
     $validar=1;  
	
	} closedir($dir);
	
}else{
$validar=1;
}	

}else{
	$validar=1;
}
$contador_img++;
}

if($validar==0){
    

    
if(consultasSQL::InsertSQL("producto", "codigo,nombre,descripcion_prod,precio_compra,precio_venta,id_categoria,imagen,fecha_creacion,seccion,descuento,existencia,id_set", "'$codigo','$nombre_producto','$descripcion','$precio_compra','$precio_venta','$id_categoria','$img','$fecha_creacion','$seccion','$descuento','$existencia','$id_set'")){


    }else{
    echo "<br><div class='alert alert-danger alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <div class='text-center'><h4>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h4></div>
        Error al insertar, por favor intente de nuevo.
        </div>";	
    }    
    
}else{
    
$validar2++;   
}
}
}
header("Location: ../../home.php?modulo=inventario&alert=4");	
}else{
    
  header("Location: ../../home.php?modulo=inventario&alert=10");     
}

?>