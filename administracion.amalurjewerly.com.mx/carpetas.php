<?php

include "./controlador/consulSQL.php";

 $consul_productos=  ejecutarSQL::consultar("SELECT * FROM producto");
                 while ($productos=mysqli_fetch_array($consul_productos)){
                     
                     if(mkdir('./img/img_productos/'.$productos['codigo'], 0777, true)) {
   

$origen ='./img/img_productos/'.$productos['imagen'] ;

$destino = 'img/img_productos/'.$productos['codigo'].'/';   ;
                         
if(copy($origen, $destino."/".$productos['imagen'])) {

echo "Se ha copiado correctamente la imagen";

}

else {

echo "No se copiado la imagen correctamente";

}
    
}else{
   die('Fallo al crear las carpetas...'); 
}
                     
                     
                 }
?>